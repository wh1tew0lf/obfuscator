<?php
/**
 * Test for global vars replacement
 */
require_once 'includes.php';

function show($var = 'some text') {
    global $globalVar;
    echo "$var\n";
    $globalVar++;
}

class TheTest {
    public $field1 = 'lol';
    public static $field2 = 'static';

    public function show($var = 'some text2') {
        otherFun($var);
    }

    public static function staticShow($var = 'some text3') {
        global $globalVar;
        global $globalObj;
        $globalObj->field2 = "Test#{$globalVar}: $var";
        show($globalObj->field2);
    }

    public static function method2() {
        echo "TheTest::method2\n";
    }
}

show('Increment once');
show('Increment twice');
show($globalObj->field1);

$th = new TheTest();
$th->show();
TheTest::staticShow('Message');
$globalObj->field1 = 'String';
TheTest::$field2 = 'String2';
TheTest::staticShow('Message');
A::method2();
