<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEK', 17 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 18 => 'Cg==', 19 => 'cGFyZW50X2FnZQ==', 20 => 'RG9uJ3Qga25vdyE=', 21 => 'QSBjb3VudDog', 22 => 'Cg==', 23 => 'QSBBZ2U6IA==', 24 => 'Cg==', 25 => 'QSBhbmQgQiBjb3VudDog', 26 => 'Cg==', 27 => 'QyBBZ2U6IA==', 28 => 'Cg==', 29 => 'QyBwYXJlbnQgYWdlOiA=', 30 => 'Cg==', 31 => 'VGVzdCBTdHJpbmc=', 32 => 'VGhpcwlpcyB0ZXh0Cg==', 33 => 'IEFORCA=', 34 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 35 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 36 => 'RW5jb2RlZCBzdHJpbmc=', 37 => 'VGVzdA==', 38 => 'IGNvbmNhdA==', 39 => 'ISEhIQ==', 40 => 'ISEhIQ==', 41 => 'Cg==', 42 => 'dGV4dA==', 43 => '', 44 => 'Cg==', 45 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
$_e3b2de02542f81a5389c7e77dd6b = 16;
$_5e0b0fbc3e9c63c5389c7e77ddb5 = 35.5;
$_3e7cacb8383f8785389c7e77ddf9 = $_e3b2de02542f81a5389c7e77dd6b * 2;
$_ee554331867f8c35389c7e77de3d = $_5e0b0fbc3e9c63c5389c7e77ddb5 * 2;
function _39733ad7ccf2c8d5389c7e77e14a($_482a94854f5920e5389c7e77de58, $_eeeece4d5f1ce4d5389c7e77de9c = 5)
{
    return $_482a94854f5920e5389c7e77de58 * $_482a94854f5920e5389c7e77de58 + $_eeeece4d5f1ce4d5389c7e77de9c / 2;
}
$_8049abd21cd701c5389c7e77dee2 = _39733ad7ccf2c8d5389c7e77e14a($_e3b2de02542f81a5389c7e77dd6b);
$_86a9c2c582b30c85389c7e77df26 = _39733ad7ccf2c8d5389c7e77e14a($_e3b2de02542f81a5389c7e77dd6b, $_3e7cacb8383f8785389c7e77ddf9);
$_283b0ac38583eea5389c7e77df6a = _39733ad7ccf2c8d5389c7e77e14a($_5e0b0fbc3e9c63c5389c7e77ddb5);
$_f17e977542faeba5389c7e77dfae = _39733ad7ccf2c8d5389c7e77e14a($_5e0b0fbc3e9c63c5389c7e77ddb5, $_ee554331867f8c35389c7e77de3d);
$_1c39f307797df0e5389c7e77dff2 = _39733ad7ccf2c8d5389c7e77e14a($_5e0b0fbc3e9c63c5389c7e77ddb5, $_e3b2de02542f81a5389c7e77dd6b);
class TheTest
{
    public function _7dd11dab17d25465389c7e77e18f($_2145c704ce76dbe5389c7e77e036 = 7)
    {
        echo number_format($_2145c704ce76dbe5389c7e77e036, 2);
    }
    public static function _559a9f5ac00a3ae5389c7e77e1d4($_2145c704ce76dbe5389c7e77e036 = 9)
    {
        echo number_format($_2145c704ce76dbe5389c7e77e036, 3);
    }
}
$_98f6d4621d373ca5389c7e77e07a = new TheTest();
$_98f6d4621d373ca5389c7e77e07a->_7dd11dab17d25465389c7e77e18f($_8049abd21cd701c5389c7e77dee2);
$_98f6d4621d373ca5389c7e77e07a->_7dd11dab17d25465389c7e77e18f($_86a9c2c582b30c85389c7e77df26);
TheTest::_559a9f5ac00a3ae5389c7e77e1d4($_283b0ac38583eea5389c7e77df6a);
TheTest::_559a9f5ac00a3ae5389c7e77e1d4($_f17e977542faeba5389c7e77dfae);
TheTest::_559a9f5ac00a3ae5389c7e77e1d4($_1c39f307797df0e5389c7e77dff2);
$_98f6d4621d373ca5389c7e77e07a->_7dd11dab17d25465389c7e77e18f(_39733ad7ccf2c8d5389c7e77e14a($_e3b2de02542f81a5389c7e77dd6b, $_3e7cacb8383f8785389c7e77ddf9));
$_98f6d4621d373ca5389c7e77e07a->_7dd11dab17d25465389c7e77e18f(_39733ad7ccf2c8d5389c7e77e14a(77));
TheTest::_559a9f5ac00a3ae5389c7e77e1d4(_39733ad7ccf2c8d5389c7e77e14a(5));
TheTest::_559a9f5ac00a3ae5389c7e77e1d4(_39733ad7ccf2c8d5389c7e77e14a($_8049abd21cd701c5389c7e77dee2, $_8049abd21cd701c5389c7e77dee2));