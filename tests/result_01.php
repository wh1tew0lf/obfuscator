<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
$_40d449f8b720e765389c7e74f65e = MyStrings(0);
$_38775a6be58b8835389c7e74f6aa = $_40d449f8b720e765389c7e74f65e . MyStrings(1);
$_6c3d9a5b9ae91645389c7e74f6ef = MyStrings(2);
for ($_65c0b4ab0e063e55389c7e74f734 = 0; $_65c0b4ab0e063e55389c7e74f734 < 5; ++$_65c0b4ab0e063e55389c7e74f734) {
    echo MyStrings(3);
}
echo $_40d449f8b720e765389c7e74f65e . $_38775a6be58b8835389c7e74f6aa . MyStrings(4);
echo $_40d449f8b720e765389c7e74f65e . MyStrings(5) . $_38775a6be58b8835389c7e74f6aa . MyStrings(6);
$_1f719e000f5d3f25389c7e74f778 = array(MyStrings(7) => $_40d449f8b720e765389c7e74f65e, MyStrings(8) => $_38775a6be58b8835389c7e74f6aa, MyStrings(9) => $_6c3d9a5b9ae91645389c7e74f6ef);
foreach ($_1f719e000f5d3f25389c7e74f778 as $_c6e0a9c15224a825389c7e74f7bc => $_063c08d6e0baf805389c7e74f800) {
    echo MyStrings(10) . $_c6e0a9c15224a825389c7e74f7bc . MyStrings(11) . $_063c08d6e0baf805389c7e74f800 . MyStrings(12);
}