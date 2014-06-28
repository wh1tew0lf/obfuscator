<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEK', 17 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 18 => 'Cg==', 19 => 'cGFyZW50X2FnZQ==', 20 => 'RG9uJ3Qga25vdyE=', 21 => 'QSBjb3VudDog', 22 => 'Cg==', 23 => 'QSBBZ2U6IA==', 24 => 'Cg==', 25 => 'QSBhbmQgQiBjb3VudDog', 26 => 'Cg==', 27 => 'QyBBZ2U6IA==', 28 => 'Cg==', 29 => 'QyBwYXJlbnQgYWdlOiA=', 30 => 'Cg==', 31 => 'VGVzdCBTdHJpbmc=', 32 => 'VGhpcwlpcyB0ZXh0Cg==', 33 => 'IEFORCA=', 34 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 35 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 36 => 'RW5jb2RlZCBzdHJpbmc=', 37 => 'VGVzdA==', 38 => 'IGNvbmNhdA==', 39 => 'ISEhIQ==', 40 => 'ISEhIQ==', 41 => 'Cg==', 42 => 'dGV4dA==', 43 => '', 44 => 'ZmllbGQx', 45 => 'ZmllbGQy', 46 => 'Cg==', 47 => 'Cg==', 48 => 'aW5jbHVkZXMucGhw', 49 => 'Cg==', 50 => 'bG9s', 51 => 'c3RhdGlj', 52 => 'VGVzdCM=', 53 => 'OiA=', 54 => 'VGhlVGVzdDo6bWV0aG9kMgo=', 55 => 'SW5jcmVtZW50IG9uY2U=', 56 => 'SW5jcmVtZW50IHR3aWNl', 57 => 'TWVzc2FnZQ==', 58 => 'U3RyaW5n', 59 => 'U3RyaW5nMg==', 60 => 'TWVzc2FnZQ==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
/**
 * Test for global vars replacement
 */
require_once MyStrings(48);
function _2($_0 = 'some text')
{
    global $globalVar;
    echo $_0 . MyStrings(49);
    $globalVar++;
}
class TheTest
{
    public $_4 = 'lol';
    public static $_6 = 'static';
    public function _2($_0 = 'some text2')
    {
        otherFun($_0);
    }
    public static function _7($_0 = 'some text3')
    {
        global $globalVar;
        global $globalObj;
        $globalObj->field2 = MyStrings(52) . $globalVar . MyStrings(53) . $_0;
        _2($globalObj->field2);
    }
    public static function _8()
    {
        echo MyStrings(54);
    }
}
_2(MyStrings(55));
_2(MyStrings(56));
_2($globalObj->field2);
$_1 = new TheTest();
$_1->_2();
TheTest::_7(MyStrings(57));
$globalObj->field1 = MyStrings(58);
TheTest::$_6 = MyStrings(59);
TheTest::_7(MyStrings(60));
A::method3();