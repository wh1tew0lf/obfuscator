<?php

if (!class_exists('PhpParser\Parser')) {
    require_once '../PHP-Parser/lib/bootstrap.php';
}

class obfuscator {
    public static $errors = array();

    public static $parser = null;

    public static $variables = array();

    public static $definedFunctions = array();

    public static $definedDynamicMethods = array();

    public static $definedStaticMethods = array();

    public static $classes = array();

    public static $class = null;

    private static $_stmts = null;

    public static $unObfuscatedVariables = array('this' => 'this');

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

    private static function _anylizeOrder(&$tree) {
        if ($tree instanceof PhpParser\Node\Stmt\Class_) {
            if (self::$class !== null) {
                self::$errors[] = 'In class "' . self::$class . '" defined class "' . $tree->name . '"';
            }
            self::$classes[$tree->name] = isset($tree->extends->parts) ? $tree->extends->parts : $tree->extends;
            self::$class = $tree->name;
        }

        if ((($tree instanceof PhpParser\Node\Expr\Variable) ||
            ($tree instanceof PhpParser\Node\Param) ||
            ($tree instanceof PhpParser\Node\Expr\PropertyFetch) ||
            ($tree instanceof PhpParser\Node\Stmt\PropertyProperty)) &&
            !isset(self::$unObfuscatedVariables[$tree->name]))
        {
            self::$variables[$tree->name] = $tree->name;
        }

        if ($tree instanceof PhpParser\Node\Stmt\Function_) {
            self::$definedFunctions[$tree->name] = $tree->name;
        }

        if ($tree instanceof PhpParser\Node\Stmt\ClassMethod) {
            if ($tree->isStatic()) {
                self::$definedStaticMethods[/*self::$class][*/$tree->name] = $tree->name;
            } else {
                self::$definedDynamicMethods[/*self::$class][*/$tree->name] = $tree->name;
            }
        }

        if (is_array($tree) || is_object($tree)) {
            foreach($tree as &$leaf) {
                self::_anylizeOrder($leaf);
            }
        }

        if ($tree instanceof PhpParser\Node\Stmt\Class_) {
            self::$class = null;
        }
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

        var_dump(self::$classes);
        var_dump(self::$definedFunctions);
        var_dump(self::$definedDynamicMethods);
        var_dump(self::$definedStaticMethods);
        var_dump(self::$_stmts);
    }

    public static function encodeName($name) {
        return '_' . substr(md5($name),1, 4) . substr(md5($name), 7, 11) . uniqid();
    }

    private static function _obfuscateOrder(&$tree) {
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

        if ((($tree instanceof PhpParser\Node\Expr\Variable) ||
            ($tree instanceof PhpParser\Node\Param) ||
            ($tree instanceof PhpParser\Node\Expr\PropertyFetch) ||
            ($tree instanceof PhpParser\Node\Stmt\PropertyProperty)) &&
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

        if (is_array($tree) || is_object($tree)) {
            foreach($tree as &$leaf) {
                self::_obfuscateOrder($leaf);
            }
        }
    }

    public static function obfuscate($code = null) {
        foreach (self::$variables as &$variable) {
            $variable = self::encodeName($variable);
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
    }

    public static function save() {
        if (self::$_stmts !== null) {
            $prettyPrinter = new PhpParser\PrettyPrinter\Standard;
            return '<?php ' . $prettyPrinter->prettyPrint(self::$_stmts);
        } else {
            return '<?php';
        }
    }
}