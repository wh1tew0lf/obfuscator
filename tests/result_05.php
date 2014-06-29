<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEK', 17 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 18 => 'Cg==', 19 => 'cGFyZW50X2FnZQ==', 20 => 'RG9uJ3Qga25vdyE=', 21 => 'QSBjb3VudDog', 22 => 'Cg==', 23 => 'QSBBZ2U6IA==', 24 => 'Cg==', 25 => 'QSBhbmQgQiBjb3VudDog', 26 => 'Cg==', 27 => 'QyBBZ2U6IA==', 28 => 'Cg==', 29 => 'QyBwYXJlbnQgYWdlOiA=', 30 => 'Cg==', 31 => 'QiBtZXRob2QgZnJvbSBDOiA=', 32 => 'Cg==', 33 => 'QiBnZXQgcGFyZW50IGFnZTog', 34 => 'Cg==', 35 => 'VGVzdCBTdHJpbmc=', 36 => 'VGhpcwlpcyB0ZXh0Cg==', 37 => 'IEFORCA=', 38 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 39 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 40 => 'RW5jb2RlZCBzdHJpbmc=', 41 => 'VGVzdA==', 42 => 'IGNvbmNhdA==', 43 => 'ISEhIQ==', 44 => 'ISEhIQ==', 45 => 'Cg==', 46 => 'dGV4dA==', 47 => '', 48 => 'ZmllbGQx', 49 => 'ZmllbGQy', 50 => 'Cg==', 51 => 'Cg==');
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
    public function _18($_11 = 7)
    {
        echo number_format($_11, 2);
    }
    public static function _19($_11 = 9)
    {
        echo number_format($_11, 3);
    }
}
$_12 = new TheTest();
$_12->_18($_6);
$_12->_18($_7);
TheTest::_19($_8);
TheTest::_19($_9);
TheTest::_19($_10);
$_12->_18(_13($_0, $_2));
$_12->_18(_13(77));
TheTest::_19(_13(5));
TheTest::_19(_13($_6, $_6));