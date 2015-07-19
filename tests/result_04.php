<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEo', 17 => 'KQo=', 18 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 19 => 'Cg==', 20 => 'cGFyZW50X2FnZQ==', 21 => 'RG9uJ3Qga25vdyE=', 22 => 'QSBjb3VudDog', 23 => 'Cg==', 24 => 'QSBBZ2U6IA==', 25 => 'Cg==', 26 => 'QSBhbmQgQiBjb3VudDog', 27 => 'Cg==', 28 => 'QyBBZ2U6IA==', 29 => 'Cg==', 30 => 'QyBwYXJlbnQgYWdlOiA=', 31 => 'Cg==', 32 => 'QiBtZXRob2QgZnJvbSBDOiA=', 33 => 'Cg==', 34 => 'QiBnZXQgcGFyZW50IGFnZTog', 35 => 'Cg==', 36 => 'QiBjb3VudDog', 37 => 'Cg==', 38 => 'QyBtZXRob2QyOiA=', 39 => 'Cg==', 40 => 'VGVzdCBTdHJpbmc=', 41 => 'VGhpcwlpcyB0ZXh0Cg==', 42 => 'IEFORCA=', 43 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 44 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 45 => 'RW5jb2RlZCBzdHJpbmc=', 46 => 'VGVzdA==', 47 => 'IGNvbmNhdA==', 48 => 'ISEhIQ==', 49 => 'ISEhIQ==', 50 => 'Cg==', 51 => 'dGV4dA==', 52 => '', 53 => 'ZmllbGQx', 54 => 'ZmllbGQy', 55 => 'Cg==', 56 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
/**
 * Test for string obfuscation
 */
$_0 = MyStrings(40);
$_1 = MyStrings(41);
$_2 = $_0 . MyStrings(42) . $_1;
$_3 = MyStrings(43) . $_0;
$_4 = MyStrings(44);
$_5 = _13(MyStrings(45));
$_6 = MyStrings(46) . MyStrings(47);
$_7 = MyStrings(48) . $_6 . _13(MyStrings(49));
function _12($_8 = 'some text')
{
    echo $_8 . MyStrings(50);
    $_9 = array(0 => MyStrings(51));
    return isset($_9[1]) ? base64_decode($_9[1]) : MyStrings(52);
}
function _13($_10)
{
    return $_10;
}
class TheTest
{
    public $_15 = 'field1';
    public static $_18 = 'field2';
    public function _12($_8 = 'some text2')
    {
        echo $_8 . MyStrings(55);
    }
    public static function _19($_8 = 'some text3')
    {
        echo $_8 . MyStrings(56);
    }
}
$_11 = new TheTest();
$_11->_12($_0);
$_11->_12($_1);
TheTest::_19($_2);
_12($_3);
_12($_4);
_12($_5);
_12($_6);
_12($_7);