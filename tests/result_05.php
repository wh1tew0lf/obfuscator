<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEK', 17 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 18 => 'Cg==', 19 => 'cGFyZW50X2FnZQ==', 20 => 'RG9uJ3Qga25vdyE=', 21 => 'QSBjb3VudDog', 22 => 'Cg==', 23 => 'QSBBZ2U6IA==', 24 => 'Cg==', 25 => 'QSBhbmQgQiBjb3VudDog', 26 => 'Cg==', 27 => 'QyBBZ2U6IA==', 28 => 'Cg==', 29 => 'QyBwYXJlbnQgYWdlOiA=', 30 => 'Cg==', 31 => 'VGVzdCBTdHJpbmc=', 32 => 'VGhpcwlpcyB0ZXh0Cg==', 33 => 'IEFORCA=', 34 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 35 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 36 => 'RW5jb2RlZCBzdHJpbmc=', 37 => 'VGVzdA==', 38 => 'IGNvbmNhdA==', 39 => 'ISEhIQ==', 40 => 'ISEhIQ==', 41 => 'Cg==', 42 => 'dGV4dA==', 43 => '', 44 => 'ZmllbGQx', 45 => 'ZmllbGQy', 46 => 'Cg==', 47 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
$_e3b2de02542f81a53a63383cd42a = 16;
$_5e0b0fbc3e9c63c53a63383cd4ea = 35.5;
$_3e7cacb8383f87853a63383cd5a0 = $_e3b2de02542f81a53a63383cd42a * 2;
$_ee554331867f8c353a63383cd62d = $_5e0b0fbc3e9c63c53a63383cd4ea * 2;
function _39733ad7ccf2c8d53a63383ce0cc($_482a94854f5920e53a63383cd6b7, $_eeeece4d5f1ce4d53a63383cd740 = 5)
{
    return $_482a94854f5920e53a63383cd6b7 * $_482a94854f5920e53a63383cd6b7 + $_eeeece4d5f1ce4d53a63383cd740 / 2;
}
$_8049abd21cd701c53a63383cd7c9 = _39733ad7ccf2c8d53a63383ce0cc($_e3b2de02542f81a53a63383cd42a);
$_86a9c2c582b30c853a63383cd853 = _39733ad7ccf2c8d53a63383ce0cc($_e3b2de02542f81a53a63383cd42a, $_3e7cacb8383f87853a63383cd5a0);
$_283b0ac38583eea53a63383cd8dc = _39733ad7ccf2c8d53a63383ce0cc($_5e0b0fbc3e9c63c53a63383cd4ea);
$_f17e977542faeba53a63383cd964 = _39733ad7ccf2c8d53a63383ce0cc($_5e0b0fbc3e9c63c53a63383cd4ea, $_ee554331867f8c353a63383cd62d);
$_1c39f307797df0e53a63383cd9ed = _39733ad7ccf2c8d53a63383ce0cc($_5e0b0fbc3e9c63c53a63383cd4ea, $_e3b2de02542f81a53a63383cd42a);
class TheTest
{
    public function _7dd11dab17d254653a63383ce159($_2145c704ce76dbe53a63383cda7e = 7)
    {
        echo number_format($_2145c704ce76dbe53a63383cda7e, 2);
    }
    public static function _559a9f5ac00a3ae53a63383ce1e5($_2145c704ce76dbe53a63383cda7e = 9)
    {
        echo number_format($_2145c704ce76dbe53a63383cda7e, 3);
    }
}
$_98f6d4621d373ca53a63383cddd5 = new TheTest();
$_98f6d4621d373ca53a63383cddd5->_7dd11dab17d254653a63383ce159($_8049abd21cd701c53a63383cd7c9);
$_98f6d4621d373ca53a63383cddd5->_7dd11dab17d254653a63383ce159($_86a9c2c582b30c853a63383cd853);
TheTest::_559a9f5ac00a3ae53a63383ce1e5($_283b0ac38583eea53a63383cd8dc);
TheTest::_559a9f5ac00a3ae53a63383ce1e5($_f17e977542faeba53a63383cd964);
TheTest::_559a9f5ac00a3ae53a63383ce1e5($_1c39f307797df0e53a63383cd9ed);
$_98f6d4621d373ca53a63383cddd5->_7dd11dab17d254653a63383ce159(_39733ad7ccf2c8d53a63383ce0cc($_e3b2de02542f81a53a63383cd42a, $_3e7cacb8383f87853a63383cd5a0));
$_98f6d4621d373ca53a63383cddd5->_7dd11dab17d254653a63383ce159(_39733ad7ccf2c8d53a63383ce0cc(77));
TheTest::_559a9f5ac00a3ae53a63383ce1e5(_39733ad7ccf2c8d53a63383ce0cc(5));
TheTest::_559a9f5ac00a3ae53a63383ce1e5(_39733ad7ccf2c8d53a63383ce0cc($_8049abd21cd701c53a63383cd7c9, $_8049abd21cd701c53a63383cd7c9));