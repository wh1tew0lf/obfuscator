<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
$_40d449f8b720e7653a633825b9f8 = MyStrings(0);
$_38775a6be58b88353a633825ba92 = $_40d449f8b720e7653a633825b9f8 . MyStrings(1);
$_6c3d9a5b9ae916453a633825bb1e = MyStrings(2);
for ($_65c0b4ab0e063e553a633825bba7 = 0; $_65c0b4ab0e063e553a633825bba7 < 5; ++$_65c0b4ab0e063e553a633825bba7) {
    echo MyStrings(3);
}
echo $_40d449f8b720e7653a633825b9f8 . $_38775a6be58b88353a633825ba92 . MyStrings(4);
echo $_40d449f8b720e7653a633825b9f8 . MyStrings(5) . $_38775a6be58b88353a633825ba92 . MyStrings(6);
$_1f719e000f5d3f253a633825bc30 = array(MyStrings(7) => $_40d449f8b720e7653a633825b9f8, MyStrings(8) => $_38775a6be58b88353a633825ba92, MyStrings(9) => $_6c3d9a5b9ae916453a633825bb1e);
foreach ($_1f719e000f5d3f253a633825bc30 as $_c6e0a9c15224a8253a633825bcaa => $_063c08d6e0baf8053a633825bd32) {
    echo MyStrings(10) . $_c6e0a9c15224a8253a633825bcaa . MyStrings(11) . $_063c08d6e0baf8053a633825bd32 . MyStrings(12);
}