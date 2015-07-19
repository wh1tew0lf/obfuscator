<?php /**
 * Test for function name replacement
 */
$_2 = 0;
function _0()
{
    echo 'Function1
';
}
function _1($_2)
{
    return ++$_2;
}
_0();
echo _1(_1($_2)) . '
';