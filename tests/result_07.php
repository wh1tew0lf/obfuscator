<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEK', 17 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 18 => 'Cg==', 19 => 'cGFyZW50X2FnZQ==', 20 => 'RG9uJ3Qga25vdyE=', 21 => 'QSBjb3VudDog', 22 => 'Cg==', 23 => 'QSBBZ2U6IA==', 24 => 'Cg==', 25 => 'QSBhbmQgQiBjb3VudDog', 26 => 'Cg==', 27 => 'QyBBZ2U6IA==', 28 => 'Cg==', 29 => 'QyBwYXJlbnQgYWdlOiA=', 30 => 'Cg==', 31 => 'VGVzdCBTdHJpbmc=', 32 => 'VGhpcwlpcyB0ZXh0Cg==', 33 => 'IEFORCA=', 34 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 35 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 36 => 'RW5jb2RlZCBzdHJpbmc=', 37 => 'VGVzdA==', 38 => 'IGNvbmNhdA==', 39 => 'ISEhIQ==', 40 => 'ISEhIQ==', 41 => 'Cg==', 42 => 'dGV4dA==', 43 => '', 44 => 'ZmllbGQx', 45 => 'ZmllbGQy', 46 => 'Cg==', 47 => 'Cg==', 48 => 'aW5jbHVkZXMucGhw', 49 => 'Cg==', 50 => 'bG9s', 51 => 'VGVzdCM=', 52 => 'OiA=', 53 => 'VGhlVGVzdDo6bWV0aG9kMgo=', 54 => 'SW5jcmVtZW50IG9uY2U=', 55 => 'SW5jcmVtZW50IHR3aWNl', 56 => 'TWVzc2FnZQ==', 57 => 'U3Rpbmc=', 58 => 'TWVzc2FnZQ==', 59 => 'aW5jbHVkZXMucGhw', 60 => 'bG9s', 61 => 'ClRlc3Qj', 62 => 'OiA=', 63 => 'Cg==', 64 => 'VGhlVGVzdDo6bWV0aG9kMgo=', 65 => 'Cg==', 66 => 'TWVzc2FnZQ==', 67 => 'TWVzc2FnZQ==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
require_once MyStrings(59);
class TheTest
{
    public $_e41e17ec0b936e053a633848ad31 = 'lol';
    public static function _559a9f5ac00a3ae53a633848ae94($_2145c704ce76dbe53a633848a8e3 = 'some text3')
    {
        global $globalVar;
        global $globalObj;
        $globalObj->field1 .= MyStrings(61) . $globalVar . MyStrings(62) . $_2145c704ce76dbe53a633848a8e3;
        echo $globalObj->field1 . MyStrings(63);
    }
    public static function _f4b14694d49e3be53a633848af1c()
    {
        echo MyStrings(64);
    }
}
echo $globalObj->field1 . MyStrings(65);
$_fdc093412ce55f053a633848a9a8 = new TheTest();
TheTest::_559a9f5ac00a3ae53a633848ae94(MyStrings(66));
TheTest::_f4b14694d49e3be53a633848af1c(MyStrings(67));
A::method2();