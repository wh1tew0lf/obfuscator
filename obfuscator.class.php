<?php
ini_set('xdebug.var_display_max_depth', -1);
        ini_set('xdebug.var_display_max_children', -1);
        ini_set('xdebug.var_display_max_data', -1);
        
/**
 * @todo Think on the using process
 * @todo Replace numbers as expressions
 * @todo Class fields undefined
 * 1) AnalizeOrder make simplier (break into many methods)
 * 2) Anylize shouldn't change code
 * 3) ObfuscateOrder make simplier (break into many methods)
 * 4) Number should expand to expressions
 */

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
    
    /*private static $dynamicProperties = array();

    private static $staticProperties = array();

    private static $dynamicMethods = array();

    private static $staticMethods = array();*/

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

    //private static $globalVariables = array();

    private static $_stmts = null;

    private static $unObfuscatedVariables = array('this' => 'this');

    private static $unObfuscatedMethods = array(
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
    
    /**
     * @var string name of strings function 
     */
    private static $_stringsMethodName = 'MyStrings';

    private static $index = 0;

    private static $types = array();

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

    public static function clearState() {
        self::$errors = array();
        self::$parser = null;
        self::$variables = array();
        self::$functions = array();
        //self::$dynamicMethods = array();
        //self::$staticMethods = array();
        self::$classes = array();
        self::$class = null;
        self::$_stmts = null;
        self::$unObfuscatedVariables = array('this' => 'this');
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
        
        self::_goDeeper($tree);
        
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
        
        self::_goDeeper($tree);
        
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
        
        self::_goDeeper($tree);
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
        
        self::_goDeeper($tree);
        
        self::$callable = null;
    }
    
    /**
     * Analyze variable
     * @param \PhpParser\Node $tree
     */
    private static function _analyzeVariable(&$tree) {
        if (null !== self::$class) {
            $value = isset(self::$classes[self::$class]['methods'][self::$callable]['variables'][$tree->name]) &&
                self::$classes[self::$class]['methods'][self::$callable]['variables'][$tree->name];
            self::$classes[self::$class]['methods'][self::$callable]['variables'][$tree->name] = $value || self::$global;
        } elseif (null !== self::$callable) {
            $value = isset(self::$functions[self::$callable]['variables'][$tree->name]) &&
                self::$functions[self::$callable]['variables'][$tree->name];
            self::$functions[self::$callable]['variables'][$tree->name] = $value || self::$global;
        } else {
            $value = isset(self::$variables[$tree->name]) &&
                self::$variables[$tree->name];
            self::$variables[$tree->name] = $value || self::$global;
        }
        
        self::_goDeeper($tree);
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
        
        self::_goDeeper($tree);
        
        self::$global = false;
    }
    
    /**
     * Analyze string
     * @param \PhpParser\Node $tree
     */
    private static function _analyzeString(&$tree) {
        //$tree->setAttribute('myid', count(self::$strings));
        self::$strings[] = $tree->value;
        self::_goDeeper($tree);
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
            self::$classes[self::$class]['methods'][self::$callable]['arguments'][$tree->name] = $tree->name;
        } elseif (null !== self::$callable) {
            self::$functions[self::$callable]['arguments'][$tree->name] = $tree->name;
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
    private static function _goDeeper(&$tree) {
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
                    self::_goDeeper($leaf);
                }
            }
        }
    }
    
    /**
     * @deprecated since version 1
     */
    private static function _anylizeOrder(&$tree) {
        /*if (is_array($tree) || is_object($tree)) {
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
                if (is_object($tree)) {
                    $tree->{$node} = self::_anylizeOrder($leaf);
                } elseif(is_array($tree)) {
                    $tree[$node] = self::_anylizeOrder($leaf);
                } else {
                    self::$errors[] = 'Undefined tree element!';
                }
            }
        }*/
    }

    /**
     * Analyze php code and show report
     * @param string|null $code php code
     */
    public static function analyze($code = null) {
        if ($code !== null) {
            self::$_stmts = self::setCode($code);
        }
        
        if (self::$_stmts !== null) {
            self::_goDeeper(self::$_stmts);
        } else {
            self::$errors[] = 'Analyze without code';
        }
        
        self::report();
    }
    
    public static function report() {
        //report
        ini_set('xdebug.var_display_max_depth', -1);
        ini_set('xdebug.var_display_max_children', -1);
        ini_set('xdebug.var_display_max_data', -1);
        /*
        echo "\nStrings:\n";
        var_dump(self::$strings);
        //*/
        //var_dump(self::$classes);
        //*
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
                
                echo '(' . implode(', ', $method['arguments']) . ')';
                $variables = array();
                foreach($method['variables'] as $name => $status) {
                    $variables[] = $name . ($status ? '[g]' : '[l]');
                }
                
                echo '{' . implode(', ', $variables) . '}';
                
                echo "\n";
            }
        }
        
        echo "\nFunctions: \n";
        foreach(self::$functions as $name => $function) {
            echo $name;
            
            echo '(' . implode(', ', $function['arguments']) . ')';

            $variables = array();
            foreach($function['variables'] as $name => $status) {
                $variables[] = $name . ($status ? '[g]' : '[l]');
            }
                
            echo '{' . implode(', ', $variables) . '}';
            
            echo "\n";
        }
        
        echo "\nVariables: \n";
        
        $variables = array();
        foreach(self::$variables as $name => $status) {
            $variables[] = $name . ($status ? '[g]' : '[l]');
        }
        
        echo '{' . implode(', ', $variables) . '}';
        
        echo "\n";
        //*/
        //*
        //var_dump(self::$_stmts);
        //*/
    }

    public static function encodeName($name) {
        //return '_' . substr(md5($name),1, 4) . substr(md5($name), 7, 11) . uniqid();
        return '_' . self::$index++;
    }

    private static function isMethodExists($className, $methodName) {
        if (isset(self::$classes[$className])) {
            return  (isset(self::$dynamicMethods[$className]) &&
                    isset(self::$dynamicMethods[$className][$methodName])) ||
                    self::isMethodExists(self::$classes[$className], $methodName);
        }
        return false;
    }

    private static function getMethod($className, $methodName) {
        if (isset(self::$classes[$className])) {
            if (isset(self::$dynamicMethods[$className][$methodName])) {
                return self::$dynamicMethods[$className][$methodName];
            } else {
                return self::getMethod(self::$classes[$className], $methodName);
            }
        }
        return $methodName;
    }

    private static function isPropertyExists($className, $propertyName) {
        if (isset(self::$classes[$className])) {
            return (isset(self::$dynamicProperties[$className]) &&
                    isset(self::$dynamicProperties[$className][$propertyName])) ||
                    self::isPropertyExists(self::$classes[$className], $propertyName);
        }
        return false;
    }

    private static function getProperty($className, $propertyName) {
        if (isset(self::$classes[$className])) {
            if (isset(self::$dynamicProperties[$className][$propertyName])) {
                return self::$dynamicProperties[$className][$propertyName];
            } else {
                return self::getProperty(self::$classes[$className], $propertyName);
            }
        }
        return $propertyName;
    }

    private static function &_obfuscateOrder(&$tree) {
        if ($tree instanceof PhpParser\Node\Stmt\Class_) {
            if (self::$class !== null) {
                self::$errors[] = 'In class "' . self::$class . '" defined class "' . $tree->name . '"';
            }
            self::$class = $tree->name;
        }

        if ((($tree instanceof PhpParser\Node\Stmt\Function_) ||
            ($tree instanceof PhpParser\Node\Expr\FuncCall)) &&
            isset(self::$functions[(string)$tree->name]))
        {
            if ($tree->name instanceof PhpParser\Node\Name) {
                $tree->name->set(self::$functions[(string)$tree->name]);
            } else {
                $tree->name = self::$functions[$tree->name];
            }
        }

        if (($tree instanceof PhpParser\Node\Expr\Assign) &&
            ($tree->expr instanceof PhpParser\Node\Expr\New_)) {
            self::$types[$tree->var->name] = (string)$tree->expr->class;
        }

        if ($tree instanceof PhpParser\Node\Stmt\Property) {
            if ($tree->isStatic()) {
                foreach($tree->props as &$leaf) {
                    if (($leaf instanceof PhpParser\Node\Stmt\PropertyProperty) &&
                        isset(self::$staticProperties[self::$class][$leaf->name])) {
                         $leaf->name = self::$staticProperties[self::$class][$leaf->name];
                    }
                }
            } else {
                foreach($tree->props as &$leaf) {
                    if (($leaf instanceof PhpParser\Node\Stmt\PropertyProperty) &&
                        isset(self::$dynamicProperties[self::$class][$leaf->name])) {
                         $leaf->name = self::$dynamicProperties[self::$class][$leaf->name];
                    }
                }
            }
        }

        if (($tree instanceof PhpParser\Node\Expr\PropertyFetch) &&
            !isset(self::$globalVariables[$tree->var->name])) {
            if (isset(self::$types[$tree->var->name]) &&
                self::isPropertyExists(self::$types[$tree->var->name], $tree->name)) {
                $tree->name = self::getProperty(self::$types[$tree->var->name],$tree->name);
                //$tree->name = self::$dynamicProperties[self::$types[$tree->var->name]][$tree->name];
            }
            /*foreach(self::$dynamicProperties as &$names) {
                if (isset($names[$tree->name])) {
                    $tree->name = $names[$tree->name];
                    break;
                }
            }*/
        }

        if (($tree instanceof PhpParser\Node\Expr\StaticPropertyFetch) &&
            isset(self::$classes[(string)$tree->class])) {
            foreach(self::$staticProperties as &$names) {
                if (isset($names[$tree->name])) {
                    $tree->name = $names[$tree->name];
                    break;
                }
            }
        }

        if ($tree instanceof PhpParser\Node\Stmt\PropertyProperty) {
            if (self::$property) {
                self::$errors[] = 'Property in Property';
            }
            self::$property = true;
        }

        if ((($tree instanceof PhpParser\Node\Expr\Variable) ||
            ($tree instanceof PhpParser\Node\Param)) &&
            isset(self::$variables[$tree->name]))
        {
            $tree->name = self::$variables[$tree->name];
        }

        if ($tree instanceof PhpParser\Node\Stmt\ClassMethod) {
            if ($tree->isStatic()) {
                if (isset(self::$staticMethods[self::$class][$tree->name])) {
                    $tree->name = self::$staticMethods[self::$class][$tree->name];
                }
            } else {
                if (isset(self::$dynamicMethods[self::$class][$tree->name])) {
                    $tree->name = self::$dynamicMethods[self::$class][$tree->name];
                }
            }
        }

        if (($tree instanceof PhpParser\Node\Expr\StaticCall) &&
            isset(self::$staticMethods[(string)$tree->class][$tree->name])) {
            $tree->name = self::$staticMethods[(string)$tree->class][$tree->name];
        }

        if ($tree instanceof PhpParser\Node\Expr\MethodCall) {
            if (isset(self::$types[$tree->var->name]) &&
                self::isMethodExists(self::$types[$tree->var->name], $tree->name)) {
                $tree->name = self::getMethod(self::$types[$tree->var->name],$tree->name);
                //$tree->name = self::$dynamicMethods[self::$types[$tree->var->name]][$tree->name];
            }
            /*foreach(self::$dynamicMethods as &$names) {
                if (isset($names[$tree->name])) {
                    $tree->name = $names[$tree->name];
                }
            }*/
        }

        if ($tree instanceof PhpParser\Node\Param) {
            if (self::$param !== null) {
                self::$errors[] = 'In param "' . self::$param . '" defined param "' . $tree->name . '"';
            }
            self::$param = $tree->name;
        }

        if (is_array($tree) || is_object($tree)) {
            foreach($tree as $node => &$leaf) {
                if (!self::$property && (self::$param === null) && ($leaf instanceof PhpParser\Node\Scalar\String)) {
                    $string = new PhpParser\Node\Expr\FuncCall(new PhpParser\Node\Name(self::$_stringsMethodName), array(
                        new PhpParser\Node\Arg(new PhpParser\Node\Scalar\LNumber(
                            (int)$leaf->getAttribute('myid', array_search($leaf->value, self::$strings))
                        ))
                    ));
                    if (is_object($tree)) {
                        $tree->{$node} = $leaf = &$string;
                    } elseif (is_array($tree)) {
                        $tree[$node] = $leaf = &$string;
                    } else {
                        self::$errors[] = 'Undefined tree element!';
                    }
                } else {
                    if (is_object($tree)) {
                        $tree->{$node} = self::_obfuscateOrder($leaf);
                    } elseif(is_array($tree)) {
                        $tree[$node] = self::_obfuscateOrder($leaf);
                    } else {
                        self::$errors[] = 'Undefined tree element!';
                    }
                }
            }
        }

        if ($tree instanceof PhpParser\Node\Stmt\PropertyProperty) {
            self::$property = false;
        }

        if ($tree instanceof PhpParser\Node\Param) {
            self::$param = null;
        }

        if ($tree instanceof PhpParser\Node\Stmt\Class_) {
            self::$class = null;
        }
        return $tree;
    }

    public static function obfuscate($code = null) {
        $boiler = self::$variables + self::$functions;
        foreach(array(self::$dynamicProperties,
            self::$staticProperties,
            self::$dynamicMethods,
            self::$staticMethods) as $arrays) {
            foreach($arrays as $array) {
                $boiler += $array;
            }
        }

        self::$index = 0;
        foreach ($boiler as $key => &$val) {
            $val = self::encodeName($val);
        }

        $containers = array(
            &self::$variables,
            &self::$functions,
        );
        foreach($containers as &$container) {
            foreach ($container as $key => &$entry) {
                $entry = isset($boiler[$key]) ? $boiler[$key] : self::encodeName($entry);
            }
        }

        $classEntries = array(
            &self::$dynamicProperties,
            &self::$staticProperties,
            &self::$dynamicMethods,
            &self::$staticMethods
        );
        foreach ($classEntries as &$class) {
            foreach($class as &$container) {
                foreach ($container as $key => &$entry) {
                    $entry = isset($boiler[$key]) ? $boiler[$key] : self::encodeName($entry);
                }
            }
        }

        self::$classes['self'] = '';

        if ($code !== null) {
            self::$_stmts = self::loadCode($code);
        }

        if (self::$_stmts !== null) {
            self::_obfuscateOrder(self::$_stmts);
        } else {
            self::$errors[] = 'Anylize without code';
        }

        self::addStringFun();
    }

    public static function addStringFun() {
        $factory = new PhpParser\BuilderFactory;

        $strings = array();
        foreach (self::$strings as $key => $string) {
            $strings[] = new PhpParser\Node\Expr\ArrayItem(
                new PhpParser\Node\Scalar\String(base64_encode($string)),
                new PhpParser\Node\Scalar\LNumber($key)
            );
        }

        $stringFun = $factory
            ->function(self::$_stringsMethodName)
            ->addParam($factory->param('offset'))
            ->addStmts(array(
                new PhpParser\Node\Expr\Assign(new PhpParser\Node\Expr\Variable('strings'), new PhpParser\Node\Expr\Array_($strings)),
                new PhpParser\Node\Stmt\Return_(new PhpParser\Node\Expr\Ternary(
                    new PhpParser\Node\Expr\Isset_(array(new PhpParser\Node\Expr\ArrayDimFetch(
                            new PhpParser\Node\Expr\Variable('strings'),
                            new PhpParser\Node\Expr\Variable('offset')
                    ))),
                    new PhpParser\Node\Expr\FuncCall(new PhpParser\Node\Name('base64_decode'), array(
                        new PhpParser\Node\Arg(new PhpParser\Node\Expr\ArrayDimFetch(
                                new PhpParser\Node\Expr\Variable('strings'),
                                new PhpParser\Node\Expr\Variable('offset')
                        ))
                    )),
                    new PhpParser\Node\Scalar\String('')
                ))
            ))
            ->getNode();
        array_unshift(self::$_stmts, $stringFun);
    }
}