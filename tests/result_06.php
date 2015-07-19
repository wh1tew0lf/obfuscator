<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEo', 17 => 'KQo=', 18 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 19 => 'Cg==', 20 => 'cGFyZW50X2FnZQ==', 21 => 'RG9uJ3Qga25vdyE=', 22 => 'QSBjb3VudDog', 23 => 'Cg==', 24 => 'QSBBZ2U6IA==', 25 => 'Cg==', 26 => 'QSBhbmQgQiBjb3VudDog', 27 => 'Cg==', 28 => 'QyBBZ2U6IA==', 29 => 'Cg==', 30 => 'QyBwYXJlbnQgYWdlOiA=', 31 => 'Cg==', 32 => 'QiBtZXRob2QgZnJvbSBDOiA=', 33 => 'Cg==', 34 => 'QiBnZXQgcGFyZW50IGFnZTog', 35 => 'Cg==', 36 => 'QiBjb3VudDog', 37 => 'Cg==', 38 => 'QyBtZXRob2QyOiA=', 39 => 'Cg==', 40 => 'VGVzdCBTdHJpbmc=', 41 => 'VGhpcwlpcyB0ZXh0Cg==', 42 => 'IEFORCA=', 43 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 44 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 45 => 'RW5jb2RlZCBzdHJpbmc=', 46 => 'VGVzdA==', 47 => 'IGNvbmNhdA==', 48 => 'ISEhIQ==', 49 => 'ISEhIQ==', 50 => 'Cg==', 51 => 'dGV4dA==', 52 => '', 53 => 'ZmllbGQx', 54 => 'ZmllbGQy', 55 => 'Cg==', 56 => 'Cg==', 57 => 'aW5jbHVkZXMucGhw', 58 => 'Cg==', 59 => 'bG9s', 60 => 'c3RhdGlj', 61 => 'VGVzdCM=', 62 => 'OiA=', 63 => 'VGhlVGVzdDo6bWV0aG9kMgo=', 64 => 'SW5jcmVtZW50IG9uY2U=', 65 => 'SW5jcmVtZW50IHR3aWNl', 66 => 'TWVzc2FnZQ==', 67 => 'U3RyaW5n', 68 => 'U3RyaW5nMg==', 69 => 'TWVzc2FnZQ==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
/**
 * Test for global vars replacement
 */
require_once MyStrings(57);
function _2($_0 = 'some text')
{
    global $globalVar;
    echo $_0 . MyStrings(58);
    $globalVar++;
}
class TheTest
{
    public $_4 = 'lol';
    public static $_7 = 'static';
    public function _2($_0 = 'some text2')
    {
        otherFun($_0);
    }
    public static function _8($_0 = 'some text3')
    {
        global $globalVar;
        global $globalObj;
        $globalObj->field2 = MyStrings(61) . $globalVar . MyStrings(62) . $_0;
        _2($globalObj->field2);
    }
    public static function _9()
    {
        echo MyStrings(63);
    }
}
_2(MyStrings(64));
_2(MyStrings(65));
_2($globalObj->field1);
$_1 = new TheTest();
$_1->_2();
TheTest::_8(MyStrings(66));
$globalObj->field1 = MyStrings(67);
TheTest::$_7 = MyStrings(68);
TheTest::_8(MyStrings(69));
A::method2();