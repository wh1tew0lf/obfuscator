<?php

$globalVar = 11;

function otherFun($arg1) {
    echo $arg1 . "\n";
}

class A {
    public $field1 = 'ttt';
    public static $field2 = 'sss';

    public function method1($param) {
        return $param . $this->field1;
    }

    public static function method2() {
        echo "A::method2" . self::$field2 . "\n";
    }
}

$globalObj = new A();