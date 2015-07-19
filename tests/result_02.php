<?php function MyStrings($offset)
{
    $strings = array(0 => 'RnVuY3Rpb24xCg==', 1 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
/**
 * Test for function name replacement
 */
$_2 = 0;
function _0()
{
    echo MyStrings(0);
}
function _1($_2)
{
    return ++$_2;
}
_0();
echo _1(_1($_2)) . MyStrings(1);