<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEo', 17 => 'KQo=', 18 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 19 => 'Cg==', 20 => 'cGFyZW50X2FnZQ==', 21 => 'RG9uJ3Qga25vdyE=', 22 => 'QSBjb3VudDog', 23 => 'Cg==', 24 => 'QSBBZ2U6IA==', 25 => 'Cg==', 26 => 'QSBhbmQgQiBjb3VudDog', 27 => 'Cg==', 28 => 'QyBBZ2U6IA==', 29 => 'Cg==', 30 => 'QyBwYXJlbnQgYWdlOiA=', 31 => 'Cg==', 32 => 'QiBtZXRob2QgZnJvbSBDOiA=', 33 => 'Cg==', 34 => 'QiBnZXQgcGFyZW50IGFnZTog', 35 => 'Cg==', 36 => 'QiBjb3VudDog', 37 => 'Cg==', 38 => 'QyBtZXRob2QyOiA=', 39 => 'Cg==', 40 => 'VGVzdCBTdHJpbmc=', 41 => 'VGhpcwlpcyB0ZXh0Cg==', 42 => 'IEFORCA=', 43 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 44 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 45 => 'RW5jb2RlZCBzdHJpbmc=', 46 => 'VGVzdA==', 47 => 'IGNvbmNhdA==', 48 => 'ISEhIQ==', 49 => 'ISEhIQ==', 50 => 'Cg==', 51 => 'dGV4dA==', 52 => '', 53 => 'ZmllbGQx', 54 => 'ZmllbGQy', 55 => 'Cg==', 56 => 'Cg==', 57 => 'aW5jbHVkZXMucGhw', 58 => 'Cg==', 59 => 'bG9s', 60 => 'c3RhdGlj', 61 => 'VGVzdCM=', 62 => 'OiA=', 63 => 'VGhlVGVzdDo6bWV0aG9kMgo=', 64 => 'SW5jcmVtZW50IG9uY2U=', 65 => 'SW5jcmVtZW50IHR3aWNl', 66 => 'TWVzc2FnZQ==', 67 => 'U3RyaW5n', 68 => 'U3RyaW5nMg==', 69 => 'TWVzc2FnZQ==', 70 => 'aW5jbHVkZXMucGhw', 71 => 'bG9s', 72 => 'ClRlc3Qj', 73 => 'OiA=', 74 => 'Cg==', 75 => 'VGhlVGVzdDo6bWV0aG9kMgo=', 76 => 'VGhpcyBzaG91bGQgYnJva2UgdGVzdAo=', 77 => 'Cg==', 78 => 'TWVzc2FnZQ==', 79 => 'TWVzc2FnZQ==', 80 => 'QSBtZXRob2Q6');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
/**
 * Test for global methods replacement
 */
require_once MyStrings(70);
class TheTest
{
    public $_5 = 'lol';
    public static function _10($_0 = 'some text3')
    {
        global $globalVar;
        global $globalObj;
        $globalObj->field1 .= MyStrings(72) . $globalVar . MyStrings(73) . $_0;
        echo $globalObj->field1 . MyStrings(74);
    }
    public static function _11()
    {
        echo MyStrings(75);
    }
    public function _9()
    {
        echo MyStrings(76);
        $globalVar = 15;
    }
}
echo $globalObj->field1 . MyStrings(77);
$_1 = new TheTest();
TheTest::_10(MyStrings(78));
TheTest::_11(MyStrings(79));
A::method2();
$_2 = new A();
$_2->method1(MyStrings(80));
$_1->_9();
$_3 = $_1;
$_3->method1();