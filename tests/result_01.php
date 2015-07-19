<?php /**
 * Test for variable-names replacement
 */
$_0 = 'Variable1';
$_1 = $_0 . ' ++';
$_2 = '$variable1 ++';
for ($_3 = 0; $_3 < 5; ++$_3) {
    echo '.';
}
echo $_0 . $_1 . '
';
echo $_0 . ' and ' . $_1 . '
';
$_4 = array('var1' => $_0, 'var2' => $_1, 'var3' => $_2);
foreach ($_4 as $_5 => $_6) {
    echo '[' . $_5 . '] => {' . $_6 . '}
';
}