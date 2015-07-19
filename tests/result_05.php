<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEo', 17 => 'KQo=', 18 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 19 => 'Cg==', 20 => 'cGFyZW50X2FnZQ==', 21 => 'RG9uJ3Qga25vdyE=', 22 => 'QSBjb3VudDog', 23 => 'Cg==', 24 => 'QSBBZ2U6IA==', 25 => 'Cg==', 26 => 'QSBhbmQgQiBjb3VudDog', 27 => 'Cg==', 28 => 'QyBBZ2U6IA==', 29 => 'Cg==', 30 => 'QyBwYXJlbnQgYWdlOiA=', 31 => 'Cg==', 32 => 'QiBtZXRob2QgZnJvbSBDOiA=', 33 => 'Cg==', 34 => 'QiBnZXQgcGFyZW50IGFnZTog', 35 => 'Cg==', 36 => 'QiBjb3VudDog', 37 => 'Cg==', 38 => 'QyBtZXRob2QyOiA=', 39 => 'Cg==', 40 => 'VGVzdCBTdHJpbmc=', 41 => 'VGhpcwlpcyB0ZXh0Cg==', 42 => 'IEFORCA=', 43 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 44 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 45 => 'RW5jb2RlZCBzdHJpbmc=', 46 => 'VGVzdA==', 47 => 'IGNvbmNhdA==', 48 => 'ISEhIQ==', 49 => 'ISEhIQ==', 50 => 'Cg==', 51 => 'dGV4dA==', 52 => '', 53 => 'ZmllbGQx', 54 => 'ZmllbGQy', 55 => 'Cg==', 56 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
/**
 * Test for number replacement
 */
$_0 = 16;
$_1 = 35.5;
$_2 = $_0 * 2;
$_3 = $_1 * 2;
function _13($_4, $_5 = 5)
{
    return $_4 * $_4 + $_5 / 2;
}
$_6 = _13($_0);
$_7 = _13($_0, $_2);
$_8 = _13($_1);
$_9 = _13($_1, $_3);
$_10 = _13($_1, $_0);
class TheTest
{
    public function _19($_11 = 7)
    {
        echo number_format($_11, 2);
    }
    public static function _20($_11 = 9)
    {
        echo number_format($_11, 3);
    }
}
$_12 = new TheTest();
$_12->_19($_6);
$_12->_19($_7);
TheTest::_20($_8);
TheTest::_20($_9);
TheTest::_20($_10);
$_12->_19(_13($_0, $_2));
$_12->_19(_13(77));
TheTest::_20(_13(5));
TheTest::_20(_13($_6, $_6));