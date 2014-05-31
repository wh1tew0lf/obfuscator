<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
$_40d449f8b720e765389ca9eac82f = MyStrings(0);
$_38775a6be58b8835389ca9eac86b = $_40d449f8b720e765389ca9eac82f . MyStrings(1);
$_6c3d9a5b9ae91645389ca9eac8a5 = MyStrings(2);
for ($_65c0b4ab0e063e55389ca9eac8e1 = 0; $_65c0b4ab0e063e55389ca9eac8e1 < 5; ++$_65c0b4ab0e063e55389ca9eac8e1) {
    echo MyStrings(3);
}
echo $_40d449f8b720e765389ca9eac82f . $_38775a6be58b8835389ca9eac86b . MyStrings(4);
echo $_40d449f8b720e765389ca9eac82f . MyStrings(5) . $_38775a6be58b8835389ca9eac86b . MyStrings(6);
$_1f719e000f5d3f25389ca9eac925 = array(MyStrings(7) => $_40d449f8b720e765389ca9eac82f, MyStrings(8) => $_38775a6be58b8835389ca9eac86b, MyStrings(9) => $_6c3d9a5b9ae91645389ca9eac8a5);
foreach ($_1f719e000f5d3f25389ca9eac925 as $_c6e0a9c15224a825389ca9eac968 => $_063c08d6e0baf805389ca9eac9ab) {
    echo MyStrings(10) . $_c6e0a9c15224a825389ca9eac968 . MyStrings(11) . $_063c08d6e0baf805389ca9eac9ab . MyStrings(12);
}