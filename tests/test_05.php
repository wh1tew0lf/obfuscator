<?php
/**
 * Test for number replacement
 */
$int1 = 16;

$float1 = 35.5;

$int2 = $int1 * 2;

$float2 = $float1 * 2;

function expression($var1, $var2 = 5) {
    return $var1 * $var1 + $var2 / 2;
}

$result1 = expression($int1);
$result2 = expression($int1, $int2);
$result3 = expression($float1);
$result4 = expression($float1, $float2);
$result5 = expression($float1, $int1);

class TheTest {
    public function show($var = 7) {
        echo number_format($var, 2);
    }

    public static function staticShow($var = 9) {
        echo number_format($var, 3);
    }
}

$test = new TheTest();
$test->show($result1);
$test->show($result2);
TheTest::staticShow($result3);
TheTest::staticShow($result4);
TheTest::staticShow($result5);
$test->show(expression($int1, $int2));
$test->show(expression(77));
TheTest::staticShow(expression(5));
TheTest::staticShow(expression($result1, $result1));
