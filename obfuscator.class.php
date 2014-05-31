<?php

/**
 * @todo Global vars ($wpdb)
 * @todo Think on the using process
 * @todo Replace numbers as expressions
 * @todo Class fields undefined
 */

if (!class_exists('PhpParser\Parser')) {
    require_once '../PHP-Parser/lib/bootstrap.php';
}

class obfuscator {
    public static $errors = array();

    public static $parser = null;

    public static $variables = array();

    public static $properties = array();

    public static $definedFunctions = array();

    public static $definedDynamicMethods = array();

    public static $definedStaticMethods = array();

    public static $strings = array();

    public static $classes = array();

    public static $class = null;

    public static $call = null;

    public static $param = null;

    public static $global = false;

    public static $property = false;

    public static $globalVariables = array();

    private static $_stmts = null;

    public static $unObfuscatedVariables = array('this' => 'this');

    public static $unObfuscatedMethods = array(
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

    private static function _parser() {
        if (self::$parser === null) {
            self::$parser = new PhpParser\Parser(new PhpParser\Lexer);
        }
        return self::$parser;
    }

    public static function loadCode($code) {
        $parser = self::_parser();
        try {
            self::$_stmts = $parser->parse($code);
        } catch (PhpParser\Error $e) {
            self::$errors[] = $e->getMessage();
        }
    }

    private static function &_anylizeOrder(&$tree) {
        if ($tree instanceof PhpParser\Node\Stmt\Class_) {
            if (self::$class !== null) {
                self::$errors[] = 'In class "' . self::$class . '" defined class "' . $tree->name . '"';
            }
            self::$classes[$tree->name] = isset($tree->extends->parts) ? $tree->extends->parts : $tree->extends;
            self::$class = $tree->name;
        }

        if ($tree instanceof PhpParser\Node\Stmt\PropertyProperty) {
            self::$properties[$tree->name] = $tree->name;
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
            self::$definedFunctions[$tree->name] = $tree->name;
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
                    self::$definedStaticMethods[/*self::$class][*/$tree->name] = $tree->name;
                } else {
                    self::$definedDynamicMethods[/*self::$class][*/$tree->name] = $tree->name;
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
            self::$_stmts = self::loadCode($code);
        }

        if (self::$_stmts !== null) {
            self::_anylizeOrder(self::$_stmts);
        } else {
            self::$errors[] = 'Anylize without code';
        }

        /*var_dump(self::$classes);
        var_dump(self::$definedFunctions);
        var_dump(self::$definedDynamicMethods);
        var_dump(self::$definedStaticMethods);*/
        //var_dump(self::$strings);
        /*var_dump(self::$properties);
        var_dump(self::$variables);*/
        //var_dump(self::$_stmts);
    }

    public static function encodeName($name) {
        return '_' . substr(md5($name),1, 4) . substr(md5($name), 7, 11) . uniqid();
    }

    private static function &_obfuscateOrder(&$tree) {
        if ((($tree instanceof PhpParser\Node\Stmt\Function_) ||
            ($tree instanceof PhpParser\Node\Expr\FuncCall)) &&
            isset(self::$definedFunctions[(string)$tree->name]))
        {
            if ($tree->name instanceof PhpParser\Node\Name) {
                $tree->name->set(self::$definedFunctions[(string)$tree->name]);
            } else {
                $tree->name = self::$definedFunctions[$tree->name];
            }
        }

        if ((($tree instanceof PhpParser\Node\Expr\PropertyFetch) ||
            ($tree instanceof PhpParser\Node\Expr\StaticPropertyFetch) ||
            ($tree instanceof PhpParser\Node\Stmt\PropertyProperty)) &&
            isset(self::$properties[$tree->name]))
        {
            $tree->name = self::$properties[$tree->name];
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

        if (((($tree instanceof PhpParser\Node\Stmt\ClassMethod) && $tree->isStatic()) ||
            ($tree instanceof PhpParser\Node\Expr\StaticCall)) &&
            isset(self::$definedStaticMethods[$tree->name])) {
            $tree->name = self::$definedStaticMethods[$tree->name];
        }

        if (((($tree instanceof PhpParser\Node\Stmt\ClassMethod) && !$tree->isStatic()) ||
            ($tree instanceof PhpParser\Node\Expr\MethodCall)) &&
            isset(self::$definedDynamicMethods[$tree->name])) {
            $tree->name = self::$definedDynamicMethods[$tree->name];
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
        return $tree;
    }

    public static function obfuscate($code = null) {
        foreach (self::$variables as &$variable) {
            $variable = self::encodeName($variable);
        }

        foreach (self::$properties as &$property) {
            $property = self::encodeName($property);
        }

        foreach (self::$definedFunctions as &$function) {
            $function = self::encodeName($function);
        }

        foreach (self::$definedDynamicMethods as &$method) {
            $method = self::encodeName($method);
        }

        foreach (self::$definedStaticMethods as &$method) {
            $method = self::encodeName($method);
        }

        if ($code !== null) {
            self::$_stmts = self::loadCode($code);
        }

        if (self::$_stmts !== null) {
            self::_obfuscateOrder(self::$_stmts);
        } else {
            self::$errors[] = 'Anylize without code';
        }

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
        //var_dump(self::$_stmts);
    }

    public static function save() {
        if (self::$_stmts !== null) {
            $prettyPrinter = new PhpParser\PrettyPrinter\Standard;
            return '<?php ' . $prettyPrinter->prettyPrint(self::$_stmts);
        } else {
            return '<?php';
        }
    }

    public static function hasErrors() {
        return !empty(self::$errors);
    }

    public static function clearState() {
        self::$errors = array();
        self::$parser = null;
        self::$variables = array();
        self::$definedFunctions = array();
        self::$definedDynamicMethods = array();
        self::$definedStaticMethods = array();
        self::$classes = array();
        self::$class = null;
        self::$_stmts = null;
        self::$unObfuscatedVariables = array('this' => 'this');
    }
}