<?php

require_once 'includes.php';

function show($var = 'some text') {
    global $globalVar;
    echo "$var\n";
    $globalVar++;
}

class TheTest {
    public function show($var = 'some text2') {
        otherFun($var);
    }

    public static function staticShow($var = 'some text3') {
        global $globalVar;
        global $globalObj;
        $globalObj->field1 = "Test#{$globalVar}: $var";
        show($globalObj->field1);
    }
}

show('Increment once');
show('Increment twice');
show($globalObj->field1);

$th = new TheTest();
$th->show();
TheTest::staticShow('Message');
