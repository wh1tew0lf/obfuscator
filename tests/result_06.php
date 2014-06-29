<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEK', 17 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 18 => 'Cg==', 19 => 'cGFyZW50X2FnZQ==', 20 => 'RG9uJ3Qga25vdyE=', 21 => 'QSBjb3VudDog', 22 => 'Cg==', 23 => 'QSBBZ2U6IA==', 24 => 'Cg==', 25 => 'QSBhbmQgQiBjb3VudDog', 26 => 'Cg==', 27 => 'QyBBZ2U6IA==', 28 => 'Cg==', 29 => 'QyBwYXJlbnQgYWdlOiA=', 30 => 'Cg==', 31 => 'QiBtZXRob2QgZnJvbSBDOiA=', 32 => 'Cg==', 33 => 'QiBnZXQgcGFyZW50IGFnZTog', 34 => 'Cg==', 35 => 'VGVzdCBTdHJpbmc=', 36 => 'VGhpcwlpcyB0ZXh0Cg==', 37 => 'IEFORCA=', 38 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 39 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 40 => 'RW5jb2RlZCBzdHJpbmc=', 41 => 'VGVzdA==', 42 => 'IGNvbmNhdA==', 43 => 'ISEhIQ==', 44 => 'ISEhIQ==', 45 => 'Cg==', 46 => 'dGV4dA==', 47 => '', 48 => 'ZmllbGQx', 49 => 'ZmllbGQy', 50 => 'Cg==', 51 => 'Cg==', 52 => 'aW5jbHVkZXMucGhw', 53 => 'Cg==', 54 => 'bG9s', 55 => 'c3RhdGlj', 56 => 'VGVzdCM=', 57 => 'OiA=', 58 => 'VGhlVGVzdDo6bWV0aG9kMgo=', 59 => 'SW5jcmVtZW50IG9uY2U=', 60 => 'SW5jcmVtZW50IHR3aWNl', 61 => 'TWVzc2FnZQ==', 62 => 'U3RyaW5n', 63 => 'U3RyaW5nMg==', 64 => 'TWVzc2FnZQ==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
/**
 * Test for global vars replacement
 */
require_once MyStrings(52);
function _2($_0 = 'some text')
{
    global $globalVar;
    echo $_0 . MyStrings(53);
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
        $globalObj->field2 = MyStrings(56) . $globalVar . MyStrings(57) . $_0;
        _2($globalObj->field2);
    }
    public static function _8()
    {
        echo MyStrings(58);
    }
}
_2(MyStrings(59));
_2(MyStrings(60));
_2($globalObj->field1);
$_1 = new TheTest();
$_1->_2();
TheTest::_7(MyStrings(61));
$globalObj->field1 = MyStrings(62);
TheTest::$_6 = MyStrings(63);
TheTest::_7(MyStrings(64));
A::method2();