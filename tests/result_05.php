<?php function MyStrings($offset)
{
    $strings = array();
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
$_e3b2de02542f81a5389c0cd6ba6a = 16;
$_5e0b0fbc3e9c63c5389c0cd6bab6 = 35.5;
$_3e7cacb8383f8785389c0cd6bafb = $_e3b2de02542f81a5389c0cd6ba6a * 2;
$_ee554331867f8c35389c0cd6bb3f = $_5e0b0fbc3e9c63c5389c0cd6bab6 * 2;
function _39733ad7ccf2c8d5389c0cd6bdec($_482a94854f5920e5389c0cd6bb84, $_eeeece4d5f1ce4d5389c0cd6bbc8 = 5)
{
    return $_482a94854f5920e5389c0cd6bb84 * $_482a94854f5920e5389c0cd6bb84 + $_eeeece4d5f1ce4d5389c0cd6bbc8 / 2;
}
$_8049abd21cd701c5389c0cd6bc0c = _39733ad7ccf2c8d5389c0cd6bdec($_e3b2de02542f81a5389c0cd6ba6a);
$_86a9c2c582b30c85389c0cd6bc51 = _39733ad7ccf2c8d5389c0cd6bdec($_e3b2de02542f81a5389c0cd6ba6a, $_3e7cacb8383f8785389c0cd6bafb);
$_283b0ac38583eea5389c0cd6bc95 = _39733ad7ccf2c8d5389c0cd6bdec($_5e0b0fbc3e9c63c5389c0cd6bab6);
$_f17e977542faeba5389c0cd6bcd9 = _39733ad7ccf2c8d5389c0cd6bdec($_5e0b0fbc3e9c63c5389c0cd6bab6, $_ee554331867f8c35389c0cd6bb3f);
$_1c39f307797df0e5389c0cd6bd1d = _39733ad7ccf2c8d5389c0cd6bdec($_5e0b0fbc3e9c63c5389c0cd6bab6, $_e3b2de02542f81a5389c0cd6ba6a);
class TheTest
{
    public function _7dd11dab17d25465389c0cd6be32($_2145c704ce76dbe5389c0cd6bd62 = 7)
    {
        echo number_format($_2145c704ce76dbe5389c0cd6bd62, 2);
    }
    public static function _559a9f5ac00a3ae5389c0cd6be77($_2145c704ce76dbe5389c0cd6bd62 = 9)
    {
        echo number_format($_2145c704ce76dbe5389c0cd6bd62, 3);
    }
}
$_98f6d4621d373ca5389c0cd6bda6 = new TheTest();
$_98f6d4621d373ca5389c0cd6bda6->_7dd11dab17d25465389c0cd6be32($_8049abd21cd701c5389c0cd6bc0c);
$_98f6d4621d373ca5389c0cd6bda6->_7dd11dab17d25465389c0cd6be32($_86a9c2c582b30c85389c0cd6bc51);
TheTest::_559a9f5ac00a3ae5389c0cd6be77($_283b0ac38583eea5389c0cd6bc95);
TheTest::_559a9f5ac00a3ae5389c0cd6be77($_f17e977542faeba5389c0cd6bcd9);
TheTest::_559a9f5ac00a3ae5389c0cd6be77($_1c39f307797df0e5389c0cd6bd1d);
$_98f6d4621d373ca5389c0cd6bda6->_7dd11dab17d25465389c0cd6be32(_39733ad7ccf2c8d5389c0cd6bdec($_e3b2de02542f81a5389c0cd6ba6a, $_3e7cacb8383f8785389c0cd6bafb));
$_98f6d4621d373ca5389c0cd6bda6->_7dd11dab17d25465389c0cd6be32(_39733ad7ccf2c8d5389c0cd6bdec(77));
TheTest::_559a9f5ac00a3ae5389c0cd6be77(_39733ad7ccf2c8d5389c0cd6bdec(5));
TheTest::_559a9f5ac00a3ae5389c0cd6be77(_39733ad7ccf2c8d5389c0cd6bdec($_8049abd21cd701c5389c0cd6bc0c, $_8049abd21cd701c5389c0cd6bc0c));