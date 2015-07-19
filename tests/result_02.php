<?php function MyStrings($_10)
{
    $_11 = array(0 => 'RnVuY3Rpb24xCg==', 1 => 'Cg==');
    return isset($_11[$_10]) ? base64_decode($_11[$_10]) : '';
}
/**
 * Test for function name replacement
 */
$_9 = 0;
function _0()
{
    echo MyStrings(0);
}
function _1($_9)
{
    return ++$_9;
}
_0();
echo _1(_1($_9)) . MyStrings(1);