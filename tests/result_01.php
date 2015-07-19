<?php function MyStrings($_7)
{
    $_8 = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=');
    return isset($_8[$_7]) ? base64_decode($_8[$_7]) : '';
}
/**
 * Test for variable-names replacement
 */
$_0 = MyStrings(0);
$_1 = $_0 . MyStrings(1);
$_2 = MyStrings(2);
for ($_3 = 0; $_3 < 5; ++$_3) {
    echo MyStrings(3);
}
echo $_0 . $_1 . MyStrings(4);
echo $_0 . MyStrings(5) . $_1 . MyStrings(4);
$_4 = array(MyStrings(7) => $_0, MyStrings(8) => $_1, MyStrings(9) => $_2);
foreach ($_4 as $_5 => $_6) {
    echo MyStrings(10) . $_5 . MyStrings(11) . $_6 . MyStrings(12);
}