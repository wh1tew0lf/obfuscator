<?php
/**
 * Test for global methods replacement
 */
require_once 'includes.php';

class TheTest {
    public $field1 = 'lol';

    public static function staticShow($var = 'some text3') {
        global $globalVar;
        global $globalObj;
        $globalObj->field1 .= "\nTest#{$globalVar}: $var";
        echo $globalObj->field1 . "\n";
    }

    public static function method2() {
        echo "TheTest::method2\n";
    }
}

echo $globalObj->field1 . "\n";

$th = new TheTest();
TheTest::staticShow('Message');
TheTest::method2('Message');
A::method2();