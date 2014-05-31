<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
$_2145c704ce76dbe5389c7e758d50 = 0;
function _523be8d3b7e112f5389c7e758d9e()
{
    echo MyStrings(13);
}
function _0c43954a1b273575389c7e758de3($_2145c704ce76dbe5389c7e758d50)
{
    return ++$_2145c704ce76dbe5389c7e758d50;
}
_523be8d3b7e112f5389c7e758d9e();
echo _0c43954a1b273575389c7e758de3(_0c43954a1b273575389c7e758de3($_2145c704ce76dbe5389c7e758d50)) . MyStrings(14);