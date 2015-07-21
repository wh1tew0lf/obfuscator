<?php

$globalVar = 11;

function otherFun($arg1) {
    echo $arg1 . "\n";
}

class A {
    public $field6 = 'ttt';
    public static $field7 = 'sss';

    public function method4($param) {
        return $param . $this->field6;
    }

    public static function method5() {
        echo "A::method5" . self::$field7 . "\n";
    }
}

$globalObj = new A();