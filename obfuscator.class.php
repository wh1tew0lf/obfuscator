<?php

if (!class_exists('PhpParser\Parser')) {
    require_once '../PHP-Parser/lib/bootstrap.php';
}

/**
 * Static class for obfuscate php code
 */
class obfuscator {

    /**
     * @var array list of errors
     */
    private static $errors = array();

    /**
     * @var PhpParser\Parser php code parser
     */
    private static $parser = null;
    
    /**
     * @var array list of classes
     */
    private static $classes = array();
    
    /**
     * @var array list of functions
     */
    private static $functions = array();

    /**
     * @var array list of global and local variales of file not in function or methods
     */
    private static $variables = array();
    
    /**
     * @var array list of srtring variables values 
     */
    private static $strings = array();

    /**
     * @var string current class when code analyzed or obfuscated 
     */
    private static $class = null;

    /**
     * @var string current callable element when code analyzed or obfuscated 
     */
    private static $callable = null;

    /**
     * @var string current param when code analyzed or obfuscated 
     */
    private static $param = null;

    /**
     * @var bool global flag when code analyzed or obfuscated 
     */
    private static $global = false;

    private static $property = false;

    /**
     * @var \PhpParser\Node[] code tree
     */
    private static $_stmts = null;
    
    private static $unObClasses = array('self' => 'self');

    private static $unObMethods = array(
        '__construct' => '__construct',
        '__destruct' => '__destruct',
        '__call' => '__call',
        '__callStatic' => '__callStatic',
        '__get' => '__get',
        '__set' => '__set',
        '__isset' => '__isset',
        '__unset' => '__unset',
        '__sleep' => '__sleep',
        '__wakeup' => '__wakeup',
        '__toString' => '__toString',
        '__invoke' => '__invoke',
        '__set_state' => '__set_state',
        '__clone' => '__clone'
    );
    
    private static $unObFunctions = array();
    
    private static $unObVariables = array('this' => 'this');
    
    /**
     * @var string name of strings function 
     */
    private static $_stringsMethodName = 'MyStrings';

    private static $index = 0;
    
    private static $classesNames = array();
    private static $methodsNames = array();
    private static $functionsNames = array();
    private static $variablesNames = array();

    /**
     * Sigleton for php parser
     * @return PhpParser\Parser
     */
    private static function _parser() {
        if (self::$parser === null) {
            self::$parser = new PhpParser\Parser(new PhpParser\Lexer);
        }
        return self::$parser;
    }

    /**
     * Returns was there some errors or not
     * @return bool
     */
    public static function hasErrors() {
        return !empty(self::$errors);
    }

    /**
     * Returns list of errors
     * @return array
     */
    public static function getErrors() {
        return self::$errors;
    }

    /**
     * Returns obfuscator state to default
     */
    private static function clearState() {
        self::$errors = array();
        //self::$parser = null;
        self::$classes = array();
        self::$functions = array();
        self::$variables = array();
        self::$strings = array();
        self::$class = null;
        self::$callable = null;
        self::$param = null;
        self::$global = null;
        self::$property = false;
        //self::$_stmts = null;
        
        self::$unObClasses = array('self' => 'self');
        self::$unObMethods = array(
            '__construct' => '__construct',
            '__destruct' => '__destruct',
            '__call' => '__call',
            '__callStatic' => '__callStatic',
            '__get' => '__get',
            '__set' => '__set',
            '__isset' => '__isset',
            '__unset' => '__unset',
            '__sleep' => '__sleep',
            '__wakeup' => '__wakeup',
            '__toString' => '__toString',
            '__invoke' => '__invoke',
            '__set_state' => '__set_state',
            '__clone' => '__clone'
        );
        self::$unObFunctions = array();
        self::$unObVariables = array('this' => 'this');
    
        self::$_stringsMethodName = 'MyStrings';
        self::$index = 0;
    }

    public static function setCode($code) {
        $parser = self::_parser();
        try {
            self::$_stmts = $parser->parse($code);
        } catch (PhpParser\Error $e) {
            self::$errors[] = $e->getMessage();
        }
    }

    public static function getCode() {
        if (self::$_stmts !== null) {
            $prettyPrinter = new PhpParser\PrettyPrinter\Standard;
            return '<?php ' . $prettyPrinter->prettyPrint(self::$_stmts);
        } else {
            return '<?php';
        }
    }

    public static function loadCode($filename) {
        if (file_exists($filename)) {
            self::setCode(file_get_contents($filename));
        } else {
            self::$errors[] = "Filename: {$filename} doesn't exists";
        }
    }

    public static function saveCode($filename) {
        file_put_contents($filename, self::getCode());
    }
    
    /**
     * Analyze class
     * @param \PhpParser\Node $tree
     */
    private static function _analyzeClass(&$tree) {
        if (self::$class !== null) {
            self::$errors[] = 'In class "' . self::$class . '" defined class "' . $tree->name . '"';
        }
        
        self::$class = $tree->name;
        
        self::$classes[$tree->name] = array(
            'extends' => isset($tree->extends->parts) ? $tree->extends->toString() : '',
            'implements' => array_reduce($tree->implements, function($carry, $item) { 
                $carry[] = $item->toString();
                return $carry;  
            }, array()),
            'fields' => array(),
            'methods' => array(),
        );
        
        self::_analyze($tree);
        
        self::$class = null;
    }
    
    /**
     * Analyze method
     * @param \PhpParser\Node $tree
     */
    private static function _analyzeMethod(&$tree) {
        if (self::$callable !== null) {
            self::$errors[] = 'In call "' . self::$callable . '" defined call "' . $tree->name . '"';
        }
        
        self::$classes[self::$class]['methods'][$tree->name] = array(
            'static' => $tree->isStatic(),
            'public' => $tree->isPublic(),
            'protected' => $tree->isProtected(),
            'private' => $tree->isPrivate(),
            'abstract' => $tree->isAbstract(),
            'final' => $tree->isFinal(),
            'arguments' => array(),
            'variables' => array(),
        );
        
        self::$callable = $tree->name;
        
        self::_analyze($tree);
        
        self::$callable = null;
    }
    
    /**
     * Analyze property
     * @param \PhpParser\Node $tree
     */
    private static function _analyzeProperty(&$tree) {
        foreach($tree->props as &$leaf) {
            self::$classes[self::$class]['fields'][$leaf->name] = array(
                'static' => $tree->isStatic(),
                'public' => $tree->isPublic(),
                'protected' => $tree->isProtected(),
                'private' => $tree->isPrivate(),
            );
        }
        
        self::_analyze($tree);
    }
    
    /**
     * Analyze function
     * @param \PhpParser\Node $tree
     */
    private static function _analyzeFunction(&$tree) {
        if (self::$callable !== null) {
            self::$errors[] = 'In call "' . self::$callable . '" defined call "' . $tree->name . '"';
        }
        
        self::$functions[$tree->name] = array(
            'arguments' => array(),
            'variables' => array(),
        );
        
        self::$callable = $tree->name;
        
        self::_analyze($tree);
        
        self::$callable = null;
    }
    
    /**
     * Analyze variable
     * @param \PhpParser\Node $tree
     */
    private static function _analyzeVariable(&$tree) {
        if (null !== self::$class) {
            $value = isset(self::$classes[self::$class]['methods'][self::$callable]['variables'][$tree->name]['global']) &&
                self::$classes[self::$class]['methods'][self::$callable]['variables'][$tree->name]['global'];
            self::$classes[self::$class]['methods'][self::$callable]['variables'][$tree->name]['global'] = $value || self::$global;
        } elseif (null !== self::$callable) {
            $value = isset(self::$functions[self::$callable]['variables'][$tree->name]['global']) &&
                self::$functions[self::$callable]['variables'][$tree->name]['global'];
            self::$functions[self::$callable]['variables'][$tree->name]['global'] = $value || self::$global;
        } else {
            $value = isset(self::$variables[$tree->name]['global']) &&
                self::$variables[$tree->name]['global'];
            self::$variables[$tree->name]['global'] = $value || self::$global;
        }
        
        self::_analyze($tree);
    }
    
    /**
     * Analyze global
     * @param \PhpParser\Node $tree
     */
    private static function _analyzeGlobal(&$tree) {
        if (self::$global) {
            self::$errors[] = 'Global in Global';
        }
        self::$global = true;
        
        self::_analyze($tree);
        
        self::$global = false;
    }
    
    /**
     * Analyze string
     * @param \PhpParser\Node $tree
     */
    private static function _analyzeString(&$tree) {
        self::$strings[] = $tree->value;
        self::_analyze($tree);
    }
    
    /**
     * Analyze param
     * @param \PhpParser\Node $tree
     */
    private static function _analyzeParam(&$tree) {
        if (self::$param !== null) {
            self::$errors[] = 'In param "' . self::$param . '" defined param "' . $tree->name . '"';
        }
        self::$param = $tree->name;
        
        if (null !== self::$class) {
            self::$classes[self::$class]['methods'][self::$callable]['arguments'][$tree->name] = array();
        } elseif (null !== self::$callable) {
            self::$functions[self::$callable]['arguments'][$tree->name] = array();
        } else {
            self::$errors[] = 'Param without callable "' . $tree->name . '"';
        }
        self::_analyzeVariable($tree);
        self::$param = null;
        
    }
    
    /**
     * Analyze function that go on next level of recursion
     * @param \PhpParser\Node[] $tree
     */
    private static function _analyze(&$tree) {
        if (is_array($tree) || is_object($tree)) {
            foreach($tree as &$leaf) {
                if ($leaf instanceof PhpParser\Node\Stmt\Class_) {
                    self::_analyzeClass($leaf);
                } elseif($leaf instanceof PhpParser\Node\Stmt\ClassMethod) {
                    self::_analyzeMethod($leaf);
                } elseif($leaf instanceof PhpParser\Node\Stmt\Property) {
                    self::_analyzeProperty($leaf);
                } elseif($leaf instanceof PhpParser\Node\Stmt\Function_) {
                    self::_analyzeFunction($leaf);
                } elseif($leaf instanceof PhpParser\Node\Stmt\Global_) {
                    self::_analyzeGlobal($leaf);
                } elseif($leaf instanceof PhpParser\Node\Param) {
                    self::_analyzeParam($leaf);
                } elseif($leaf instanceof PhpParser\Node\Expr\Variable) {
                    self::_analyzeVariable($leaf);
                } elseif($leaf instanceof PhpParser\Node\Scalar\String) {
                    self::_analyzeString($leaf);
                } else {
                    self::_analyze($leaf);
                }
            }
        }
    }
    
    /**
     * Analyze php code and show report
     * @param string|null $code php code
     */
    public static function analyze($code = null) {
        self::clearState();
        if ($code !== null) {
            self::$_stmts = self::setCode($code);
        }
        
        if (self::$_stmts !== null) {
            self::_analyze(self::$_stmts);
        } else {
            self::$errors[] = 'Analyze without code';
        }
        
        self::report();
    }
    
    /**
     * Encodes name to some unified
     * @param string $name
     * @return string New name
     */
    private static function encodeName($name) {
        //return '_' . substr(md5($name),1, 4) . substr(md5($name), 7, 11) . uniqid();
        return '_' . self::$index++;
    }

    /**
     * Makes prepares before obfuscate - concatenates strings
     * @param \PhpParser\Node $tree
     */
    private static function &_beforeObfuscate(&$tree) {
        if (is_array($tree) || is_object($tree)) {
            foreach($tree as $node => &$leaf) {
                if ($leaf instanceof PhpParser\Node\Scalar\Encapsed) {
                    $concat = false;
                    foreach ($leaf->parts as &$part) {
                        if ($concat === false) {
                            $concat = is_string($part) ? new PhpParser\Node\Scalar\String($part) : $part;
                        } else {
                            $concat = new PhpParser\Node\Expr\BinaryOp\Concat($concat, is_string($part) ? new PhpParser\Node\Scalar\String($part) : $part);
                        }
                    }
                    if (is_object($tree)) {
                        $tree->{$node} = $leaf = &$concat;
                    } elseif (is_array($tree)) {
                        $tree[$node] = $leaf = &$concat;
                    } else {
                        self::$errors[] = 'Undefined tree element!';
                    }
                }
                if (($leaf instanceof PhpParser\NodeAbstract) && (null !== $leaf->getAttribute('comments'))) {
                    $leaf->setAttribute('comments', array());
                }
                if (is_object($tree)) {
                    $tree->{$node} = self::_beforeObfuscate($leaf);
                } elseif(is_array($tree)) {
                    $tree[$node] = self::_beforeObfuscate($leaf);
                } else {
                    self::$errors[] = 'Undefined tree element!';
                }
            }
        }
        return $tree;
    }
    
    /**
     * Obfuscates classes
     * @param \PhpParser\Node $tree
     */
    private static function &_obfuscateClass(&$tree) {
        self::$class = $tree->name;
        if (isset(self::$classesNames[(string)$tree->name])) {
            if ($tree->name instanceof PhpParser\Node\Name) {
                $tree->name->set(self::$classesNames[$tree->name->toString()]);
            } else {
                $tree->name = self::$classesNames[$tree->name];
            }
        }
        if (isset(self::$classesNames[(string)$tree->extends])) {
            if ($tree->extends instanceof PhpParser\Node\Name) {
                $tree->extends->set(self::$classesNames[$tree->extends->toString()]);
            } else {
                $tree->extends = self::$classesNames[$tree->extends];
            }
        }
        $result = self::_obfuscate($tree);
        self::$class = null;
        return $result;
    }
    
    /**
     * Obfuscates methods
     * @param \PhpParser\Node $tree
     */
    private static function &_obfuscateMethod(&$tree) {
        if ($tree instanceof PhpParser\Node\Stmt\ClassMethod) {
            self::$callable = $tree->name;
        }
        
        if (isset(self::$methodsNames[(string)$tree->name])) {
            if ($tree->name instanceof PhpParser\Node\Name) {
                $tree->name->set(self::$methodsNames[$tree->name->toString()]);
            } else {
                $tree->name = self::$methodsNames[$tree->name];
            }
        }
        
        if ($tree instanceof PhpParser\Node\Expr\StaticCall) {
            $result = self::_obfuscateNew($tree);
        } else {
            $result = self::_obfuscate($tree);
        }
        
        if ($tree instanceof PhpParser\Node\Stmt\ClassMethod) {
            self::$callable = null;
        }
        return $result;
    }
    
    /**
     * Obfuscates functions
     * @param \PhpParser\Node $tree
     */
    private static function &_obfuscateFunction(&$tree) {
        if ($tree instanceof PhpParser\Node\Stmt\Function_) {
            self::$callable = $tree->name;
        }
        
        if (isset(self::$functionsNames[(string)$tree->name])) {
            if ($tree->name instanceof PhpParser\Node\Name) {
                $tree->name->set(self::$functionsNames[$tree->name->toString()]);
            } else {
                $tree->name = self::$functionsNames[$tree->name];
            }
        }
        
        $result = self::_obfuscate($tree);
        
        if ($tree instanceof PhpParser\Node\Stmt\Function_) {
            self::$callable = null;
        }
        return $result;
    }
    
    /**
     * Obfuscates properties
     * @param \PhpParser\Node $tree
     */
    private static function &_obfuscateProperty(&$tree) {
        if ($tree instanceof PhpParser\Node\Stmt\PropertyProperty) {
            self::$property = true;
        }
        
        if (isset(self::$variablesNames[(string)$tree->name])) {
            if ($tree->name instanceof PhpParser\Node\Name) {
                $tree->name->set(self::$variablesNames[$tree->name->toString()]);
            } else {
                $tree->name = self::$variablesNames[$tree->name];
            }
        }
        
        if ($tree instanceof PhpParser\Node\Expr\StaticPropertyFetch) {
            $result = self::_obfuscateNew($tree);
        } else {
            $result = self::_obfuscate($tree);
        }
        
        if ($tree instanceof PhpParser\Node\Stmt\PropertyProperty) {
            self::$property = null;
        }
       
        return $result;
    }
    
    /**
     * Obfuscates variables
     * @param \PhpParser\Node $tree
     */
    private static function &_obfuscateVariable(&$tree) {
        if ($tree instanceof PhpParser\Node\Param) {
            self::$param = $tree->name;
        }
        if (isset(self::$variablesNames[(string)$tree->name])) {
            if ($tree->name instanceof PhpParser\Node\Name) {
                $tree->name->set(self::$variablesNames[$tree->name->toString()]);
            } else {
                $tree->name = self::$variablesNames[$tree->name];
            }
        }
        
        $result = self::_obfuscate($tree);
        if ($tree instanceof PhpParser\Node\Param) {
            self::$param = null;
        }
        return $result;
    }
    
    /**
     * Obfuscates classes at new construct and static call/fetch
     * @param \PhpParser\Node $tree
     */
    private static function &_obfuscateNew(&$tree) {
        if (isset(self::$classesNames[(string)$tree->class])) {
            if ($tree->class instanceof PhpParser\Node\Name) {
                $tree->class->set(self::$classesNames[$tree->class->toString()]);
            } else {
                $tree->class = self::$classesNames[$tree->class];
            }
        }
        
        $result = self::_obfuscate($tree);
       
        return $result;
    }
    
    /**
     * Obfuscates strings
     * @param \PhpParser\Node $tree
     */
    private static function &_obfuscateString(&$tree) {
        if (!self::$property && (null === self::$param)) {
            $tree = new PhpParser\Node\Expr\FuncCall(new PhpParser\Node\Name(self::$_stringsMethodName), array(
                new PhpParser\Node\Arg(new PhpParser\Node\Scalar\LNumber(
                    (int)array_search($tree->value, self::$strings)
                ))
            ));
        }
        
        $result = self::_obfuscate($tree);
       
        return $result;
    }
    
    /**
     * Obfuscates strings
     * @param \PhpParser\Node $tree
     */
    private static function &_obfuscateNumber(&$tree) {
        if (!self::$property && (null === self::$param)) {
            $value = $tree->value;
            if ($value > 0) {
                $left = rand(0, $value);
                $right = $value - $left;
                
                $result = new PhpParser\Node\Expr\BinaryOp\Plus(
                    new PhpParser\Node\Scalar\LNumber($left),
                    new PhpParser\Node\Scalar\LNumber($right)
                );
            } else {
                $left = rand(1, 100 * (abs($value) + 1));
                $right = $value + $left;
                
                $result = new PhpParser\Node\Expr\BinaryOp\Minus(
                    new PhpParser\Node\Scalar\LNumber($left),
                    new PhpParser\Node\Scalar\LNumber($right)
                );
            }
        } else {
            $result = self::_obfuscate($tree);
        }
       
        return $result;
    }
    
    /**
     * Goes deeper at recursion or tree
     * @param \PhpParser\Node[] $tree
     */
    private static function &_obfuscate(&$tree) {
        if (is_array($tree) || is_object($tree)) {
            foreach($tree as $node => &$leaf) {
                if ($leaf instanceof PhpParser\Node\Stmt\Class_) {
                    $result = self::_obfuscateClass($leaf);
                } elseif (($leaf instanceof PhpParser\Node\Stmt\ClassMethod) ||
                    ($leaf instanceof PhpParser\Node\Expr\StaticCall) ||
                    ($leaf instanceof PhpParser\Node\Expr\MethodCall)) {
                    $result = self::_obfuscateMethod($leaf);
                } elseif (($leaf instanceof PhpParser\Node\Stmt\Function_) ||
                    ($leaf instanceof PhpParser\Node\Expr\FuncCall)) {
                    $result = self::_obfuscateFunction($leaf);
                } elseif (($leaf instanceof PhpParser\Node\Expr\PropertyFetch) ||
                    ($leaf instanceof PhpParser\Node\Stmt\Property) ||
                    ($leaf instanceof PhpParser\Node\Stmt\PropertyProperty) ||
                    ($leaf instanceof PhpParser\Node\Expr\StaticPropertyFetch)) {
                    $result = self::_obfuscateProperty($leaf);
                } elseif (($leaf instanceof PhpParser\Node\Expr\Variable) ||
                    ($leaf instanceof PhpParser\Node\Param)) {
                    $result = self::_obfuscateVariable($leaf);
                } elseif ($leaf instanceof PhpParser\Node\Expr\New_) {
                    $result = self::_obfuscateNew($leaf);
                } elseif (($leaf instanceof PhpParser\Node\Scalar\String)) {
                    $result = self::_obfuscateString($leaf);
                } elseif (($leaf instanceof PhpParser\Node\Scalar\LNumber)) {
                    $result = self::_obfuscateNumber($leaf);
                } else {
                    $result = self::_obfuscate($leaf);
                }
                
                if (is_object($tree)) {
                    $tree->{$node} = $result;
                } elseif(is_array($tree)) {
                    $tree[$node] = $result;
                } else {
                    self::$errors[] = 'Undefined tree element!';
                }
            }
        }
        return $tree;
    }

    /**
     * Obfuscate code
     * @param string|null $code Code for obfuscation
     */
    public static function obfuscate($code = null) {
        self::clearState();
        if ($code !== null) {
            self::$_stmts = self::setCode($code);
        }
        
        if (self::$_stmts !== null) {
            self::_beforeObfuscate(self::$_stmts); //prepare scalars
            self::_analyze(self::$_stmts);
        } else {
            self::$errors[] = 'Analyze without code';
        }
        
        foreach(self::$classes as $cname => $content) {
            if (!isset(self::$unObClasses[$cname])) {
                self::$classesNames[$cname] = $cname;
            }
            foreach($content['fields'] as $fname => $field) {
                self::$variablesNames[$fname] = $fname; //TODO ??
            }
            foreach($content['methods'] as $mname => $method) {
                if (!isset(self::$unObMethods[$mname])) {
                    self::$methodsNames[$mname] = $mname;
                }
                foreach($method['arguments'] as $aname => $argument) {
                    if (!isset(self::$unObVariables[$aname])) {
                        self::$variablesNames[$aname] = $aname;
                    }
                }
                foreach($method['variables'] as $vname => $variable) {
                    if (!isset(self::$unObVariables[$vname])) {
                        self::$variablesNames[$vname] = $vname;
                    }
                }
            }
        }
        
        foreach(self::$functions as $name => $function) {
            if (!isset(self::$unObFunctions[$name])) {
                self::$functionsNames[$name] = $name;
            }
            foreach($function['arguments'] as $aname => $argument) {
                if (!isset(self::$unObVariables[$aname])) {
                    self::$variablesNames[$aname] = $aname;
                }
            }
            foreach($function['variables'] as $vname => $variable) {
                if (!isset(self::$unObVariables[$vname])) {
                    self::$variablesNames[$vname] = $vname;
                }
            }
        }
        
        foreach(self::$variables as $name => $status) {
            if (!isset(self::$unObVariables[$name])) {
                self::$variablesNames[$name] = $name;
            }
        }
        
        $boiler = self::$classesNames + self::$methodsNames + self::$functionsNames + self::$variablesNames;
        
        foreach ($boiler as &$val) {
            $val = self::encodeName($val);
        }
        
        foreach(self::$classesNames as $key => $name) {
            self::$classesNames[$key] = isset($boiler[$key]) ? $boiler[$key] : $name;
        }
        
        foreach(self::$methodsNames as $key => $name) {
            self::$methodsNames[$key] = isset($boiler[$key]) ? $boiler[$key] : $name;
        }
        
        foreach(self::$functionsNames as $key => $name) {
            self::$functionsNames[$key] = isset($boiler[$key]) ? $boiler[$key] : $name;
        }
        
        foreach(self::$variablesNames as $key => $name) {
            self::$variablesNames[$key] = isset($boiler[$key]) ? $boiler[$key] : $name;
        }
        
        if (self::$_stmts !== null) {
            self::$_stmts = self::_obfuscate(self::$_stmts);
        } else {
            self::$errors[] = 'Obfuscate without code';
        }

        self::addStringFunction();
    }

    /**
     * Add to code strings function
     */
    private static function addStringFunction() {
        $factory = new PhpParser\BuilderFactory;

        $stringList = array();
        foreach (self::$strings as $key => $string) {
            $stringList[] = new PhpParser\Node\Expr\ArrayItem(
                new PhpParser\Node\Scalar\String(base64_encode($string)),
                new PhpParser\Node\Scalar\LNumber($key)
            );
        }
        
        $offset = self::encodeName('offset');
        $strings = self::encodeName('strings');

        $stringFun = $factory
            ->function(self::$_stringsMethodName)
            ->addParam($factory->param($offset))
            ->addStmts(array(
                new PhpParser\Node\Expr\Assign(new PhpParser\Node\Expr\Variable($strings), new PhpParser\Node\Expr\Array_($stringList)),
                new PhpParser\Node\Stmt\Return_(new PhpParser\Node\Expr\Ternary(
                    new PhpParser\Node\Expr\Isset_(array(new PhpParser\Node\Expr\ArrayDimFetch(
                            new PhpParser\Node\Expr\Variable($strings),
                            new PhpParser\Node\Expr\Variable($offset)
                    ))),
                    new PhpParser\Node\Expr\FuncCall(new PhpParser\Node\Name('base64_decode'), array(
                        new PhpParser\Node\Arg(new PhpParser\Node\Expr\ArrayDimFetch(
                                new PhpParser\Node\Expr\Variable($strings),
                                new PhpParser\Node\Expr\Variable($offset)
                        ))
                    )),
                    new PhpParser\Node\Scalar\String('')
                ))
            ))
            ->getNode();
        array_unshift(self::$_stmts, $stringFun);
    }
    
    /**
     * Show report
     */
    public static function report() {
        echo "\nClasses:\n";
        foreach(self::$classes as $cname => $content) {
            echo "\n{$cname} extends {$content['extends']} implements " . implode(', ', $content['implements']) . "\n";
            
            echo "Fields: \n";
            foreach($content['fields'] as $fname => $field) {
                echo "\t";
                if ($field['public']) {
                    echo 'public ';
                } elseif ($field['protected']) {
                    echo 'protected ';
                } elseif ($field['private']) {
                    echo 'private ';
                }
                
                if ($field['static']) {
                    echo 'static ';
                }
                
                echo $fname . "\n";
            }
            
            echo "Methods: \n";
            foreach($content['methods'] as $mname => $method) {
                echo "\t";
                if ($method['public']) {
                    echo 'public ';
                } elseif ($method['protected']) {
                    echo 'protected ';
                } elseif ($method['private']) {
                    echo 'private ';
                }
                
                if ($method['static']) {
                    echo 'static ';
                }
                
                echo $mname;
                
                echo '(' . implode(', ', array_keys($method['arguments'])) . ')';
                $variables = array();
                foreach($method['variables'] as $name => $status) {
                    $variables[] = $name . ($status['global'] ? '[g]' : '[l]');
                }
                
                echo '{' . implode(', ', $variables) . '}';
                
                echo "\n";
            }
        }
        
        echo "\nFunctions: \n";
        foreach(self::$functions as $name => $function) {
            echo $name;
            
            echo '(' . implode(', ', array_keys($function['arguments'])) . ')';

            $variables = array();
            foreach($function['variables'] as $name => $status) {
                $variables[] = $name . ($status['global'] ? '[g]' : '[l]');
            }
                
            echo '{' . implode(', ', $variables) . '}';
            
            echo "\n";
        }
        
        echo "\nVariables: \n";
        
        $variables = array();
        foreach(self::$variables as $name => $status) {
            $variables[] = $name . ($status['global'] ? '[g]' : '[l]');
        }
        
        echo '{' . implode(', ', $variables) . '}';
        
        echo "\n";
        //*/
        /*
        ini_set('xdebug.var_display_max_depth', -1);
        ini_set('xdebug.var_display_max_children', -1);
        ini_set('xdebug.var_display_max_data', -1);
        var_dump(self::$_stmts);
        //*/
    }
}