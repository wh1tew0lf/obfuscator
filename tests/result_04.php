<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEK', 17 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 18 => 'Cg==', 19 => 'cGFyZW50X2FnZQ==', 20 => 'RG9uJ3Qga25vdyE=', 21 => 'QSBjb3VudDog', 22 => 'Cg==', 23 => 'QSBBZ2U6IA==', 24 => 'Cg==', 25 => 'QSBhbmQgQiBjb3VudDog', 26 => 'Cg==', 27 => 'QyBBZ2U6IA==', 28 => 'Cg==', 29 => 'QyBwYXJlbnQgYWdlOiA=', 30 => 'Cg==', 31 => 'QiBtZXRob2QgZnJvbSBDOiA=', 32 => 'Cg==', 33 => 'QiBnZXQgcGFyZW50IGFnZTog', 34 => 'Cg==', 35 => 'VGVzdCBTdHJpbmc=', 36 => 'VGhpcwlpcyB0ZXh0Cg==', 37 => 'IEFORCA=', 38 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 39 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 40 => 'RW5jb2RlZCBzdHJpbmc=', 41 => 'VGVzdA==', 42 => 'IGNvbmNhdA==', 43 => 'ISEhIQ==', 44 => 'ISEhIQ==', 45 => 'Cg==', 46 => 'dGV4dA==', 47 => '', 48 => 'ZmllbGQx', 49 => 'ZmllbGQy', 50 => 'Cg==', 51 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
/**
 * Test for string obfuscation
 */
$_0 = MyStrings(35);
$_1 = MyStrings(36);
$_2 = $_0 . MyStrings(37) . $_1;
$_3 = MyStrings(38) . $_0;
$_4 = MyStrings(39);
$_5 = _13(MyStrings(40));
$_6 = MyStrings(41) . MyStrings(42);
$_7 = MyStrings(43) . $_6 . _13(MyStrings(44));
function _12($_8 = 'some text')
{
    echo $_8 . MyStrings(45);
    $_9 = array(0 => MyStrings(46));
    return isset($_9[1]) ? base64_decode($_9[1]) : MyStrings(47);
}
function _13($_10)
{
    return $_10;
}
class TheTest
{
    public $_15 = 'field1';
    public static $_17 = 'field2';
    public function _12($_8 = 'some text2')
    {
        echo $_8 . MyStrings(50);
    }
    public static function _18($_8 = 'some text3')
    {
        echo $_8 . MyStrings(51);
    }
}
$_11 = new TheTest();
$_11->_12($_0);
$_11->_12($_1);
TheTest::_18($_2);
_12($_3);
_12($_4);
_12($_5);
_12($_6);
_12($_7);