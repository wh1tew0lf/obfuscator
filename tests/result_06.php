<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEK', 17 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 18 => 'Cg==', 19 => 'cGFyZW50X2FnZQ==', 20 => 'RG9uJ3Qga25vdyE=', 21 => 'QSBjb3VudDog', 22 => 'Cg==', 23 => 'QSBBZ2U6IA==', 24 => 'Cg==', 25 => 'QSBhbmQgQiBjb3VudDog', 26 => 'Cg==', 27 => 'QyBBZ2U6IA==', 28 => 'Cg==', 29 => 'QyBwYXJlbnQgYWdlOiA=', 30 => 'Cg==', 31 => 'VGVzdCBTdHJpbmc=', 32 => 'VGhpcwlpcyB0ZXh0Cg==', 33 => 'IEFORCA=', 34 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 35 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 36 => 'RW5jb2RlZCBzdHJpbmc=', 37 => 'VGVzdA==', 38 => 'IGNvbmNhdA==', 39 => 'ISEhIQ==', 40 => 'ISEhIQ==', 41 => 'Cg==', 42 => 'dGV4dA==', 43 => '', 44 => 'ZmllbGQx', 45 => 'ZmllbGQy', 46 => 'Cg==', 47 => 'Cg==', 48 => 'aW5jbHVkZXMucGhw', 49 => 'Cg==', 50 => 'bG9s', 51 => 'VGVzdCM=', 52 => 'OiA=', 53 => 'VGhlVGVzdDo6bWV0aG9kMgo=', 54 => 'SW5jcmVtZW50IG9uY2U=', 55 => 'SW5jcmVtZW50IHR3aWNl', 56 => 'TWVzc2FnZQ==', 57 => 'U3Rpbmc=', 58 => 'TWVzc2FnZQ==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
require_once MyStrings(48);
function _7dd11dab17d254653a63384365f1($_2145c704ce76dbe53a63384362af = 'some text')
{
    global $globalVar;
    echo $_2145c704ce76dbe53a63384362af . MyStrings(49);
    $globalVar++;
}
class TheTest
{
    public $_e41e17ec0b936e053a63384364de = 'lol';
    public function _7dd11dab17d254653a633843667d($_2145c704ce76dbe53a63384362af = 'some text2')
    {
        otherFun($_2145c704ce76dbe53a63384362af);
    }
    public static function _559a9f5ac00a3ae53a6338436708($_2145c704ce76dbe53a63384362af = 'some text3')
    {
        global $globalVar;
        global $globalObj;
        $globalObj->field2 = MyStrings(51) . $globalVar . MyStrings(52) . $_2145c704ce76dbe53a63384362af;
        _7dd11dab17d254653a63384365f1($globalObj->field2);
    }
    public static function _f4b14694d49e3be53a6338436791()
    {
        echo MyStrings(53);
    }
}
_7dd11dab17d254653a63384365f1(MyStrings(54));
_7dd11dab17d254653a63384365f1(MyStrings(55));
_7dd11dab17d254653a63384365f1($globalObj->field2);
$_fdc093412ce55f053a6338436340 = new TheTest();
$_fdc093412ce55f053a6338436340->_7dd11dab17d254653a633843667d();
TheTest::_559a9f5ac00a3ae53a6338436708(MyStrings(56));
$globalObj->field1 = MyStrings(57);
TheTest::_559a9f5ac00a3ae53a6338436708(MyStrings(58));
A::method3();