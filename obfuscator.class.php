<?php

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

class obfuscator {

    private static $errors = array();

    private static $parser = null;

    private static $variables = array();

    private static $functions = array();

    private static $dynamicProperties = array();

    private static $staticProperties = array();

    private static $dynamicMethods = array();

    private static $staticMethods = array();

    private static $strings = array();

    private static $classes = array();

    private static $class = null;

    private static $call = null;

    private static $param = null;

    private static $global = false;

    private static $property = false;

    private static $globalVariables = array();

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

    private static $index = 0;

    private static $types = array();

    private static function _parser() {
        if (self::$parser === null) {
            self::$parser = new PhpParser\Parser(new PhpParser\Lexer);
        }
        return self::$parser;
    }

    public static function hasErrors() {
        return !empty(self::$errors);
    }

    public static function getErrors() {
        return self::$errors;
    }

    public static function clearState() {
        self::$errors = array();
        self::$parser = null;
        self::$variables = array();
        self::$functions = array();
        self::$dynamicMethods = array();
        self::$staticMethods = array();
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

    private static function &_anylizeOrder(&$tree) {
        if ($tree instanceof PhpParser\Node\Stmt\Class_) {
            if (self::$class !== null) {
                self::$errors[] = 'In class "' . self::$class . '" defined class "' . $tree->name . '"';
            }
            self::$classes[$tree->name] = isset($tree->extends->parts) ? (string)$tree->extends : '';
            self::$class = $tree->name;
        }

        if ($tree instanceof PhpParser\Node\Stmt\Property) {
            if ($tree->isStatic()) {
                foreach($tree->props as &$leaf) {
                    self::$staticProperties[self::$class][$leaf->name] = $leaf->name;
                }
            } else {
                foreach($tree->props as &$leaf) {
                    self::$dynamicProperties[self::$class][$leaf->name] = $leaf->name;
                }
            }
        }

        if (($tree instanceof PhpParser\Node\Expr\Variable) && self::$global) {
            self::$globalVariables[$tree->name] = $tree->name;
        }

        if ((($tree instanceof PhpParser\Node\Expr\Variable) ||
            ($tree instanceof PhpParser\Node\Param)) &&
            !isset(self::$globalVariables[$tree->name]) &&
            !isset(self::$unObfuscatedVariables[$tree->name]))
        {
            self::$variables[$tree->name] = $tree->name;
        }

        if ($tree instanceof PhpParser\Node\Stmt\Function_) {
            self::$functions[$tree->name] = $tree->name;
            self::$call = $tree->name;
        }

        if ($tree instanceof PhpParser\Node\Stmt\Global_) {
            if (self::$global) {
                self::$errors[] = 'Global in Global';
            }
            self::$global = true;
        }

        if ($tree instanceof PhpParser\Node\Stmt\ClassMethod) {
            if (!isset(self::$unObfuscatedMethods[$tree->name])) {
                if ($tree->isStatic()) {
                    self::$staticMethods[self::$class][$tree->name] = $tree->name;
                } else {
                    self::$dynamicMethods[self::$class][$tree->name] = $tree->name;
                }
            }
            if (self::$call !== null) {
                self::$errors[] = 'In call "' . self::$call . '" defined call "' . $tree->name . '"';
            }
            self::$call = $tree->name;
        }

        if ($tree instanceof PhpParser\Node\Param) {
            if (self::$param !== null) {
                self::$errors[] = 'In param "' . self::$param . '" defined param "' . $tree->name . '"';
            }
            self::$param = $tree->name;
        }

        if ((self::$param === null) && ($tree instanceof PhpParser\Node\Scalar\String)) {
            $tree->setAttribute('myid', count(self::$strings));
            self::$strings[] = $tree->value;
        }

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
                if (is_object($tree)) {
                    $tree->{$node} = self::_anylizeOrder($leaf);
                } elseif(is_array($tree)) {
                    $tree[$node] = self::_anylizeOrder($leaf);
                } else {
                    self::$errors[] = 'Undefined tree element!';
                }
            }
        }

        if ($tree instanceof PhpParser\Node\Stmt\Global_) {
            self::$global = false;
        }

        if ($tree instanceof PhpParser\Node\Param) {
            self::$param = null;
        }

        if (($tree instanceof PhpParser\Node\Stmt\ClassMethod) ||
            ($tree instanceof PhpParser\Node\Stmt\Function_)) {
            self::$call = null;
        }

        if ($tree instanceof PhpParser\Node\Stmt\Class_) {
            self::$class = null;
        }
        return $tree;
    }

    public static function anylize($code = null) {
        if ($code !== null) {
            self::$_stmts = self::setCodeCode($code);
        }

        if (self::$_stmts !== null) {
            self::_anylizeOrder(self::$_stmts);
        } else {
            self::$errors[] = 'Anylize without code';
        }

        /*
        echo "\nStrings:\n";
        var_dump(self::$strings);
        echo "\nVariables:\n";
        var_dump(self::$variables);
        echo "\nFunctions:\n";
        var_dump(self::$functions);
        //*/
        /*
        echo "\nClasses:\n";
        var_dump(self::$classes);
        echo "\nDynamic properties:\n";
        var_dump(self::$dynamicProperties);
        echo "\nStatic properties:\n";
        var_dump(self::$staticProperties);
        echo "\nDynamic methods:\n";
        var_dump(self::$dynamicMethods);
        echo "\nStatic methods:\n";
        var_dump(self::$staticMethods);
        //*/
        /*
        echo '<pre>';
        var_export(self::$_stmts);
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
                    $string = new PhpParser\Node\Expr\FuncCall(new PhpParser\Node\Name('MyStrings'), array(
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
            ->function('MyStrings')
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