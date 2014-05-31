<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEK', 17 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 18 => 'Cg==', 19 => 'cGFyZW50X2FnZQ==', 20 => 'RG9uJ3Qga25vdyE=', 21 => 'QSBjb3VudDog', 22 => 'Cg==', 23 => 'QSBBZ2U6IA==', 24 => 'Cg==', 25 => 'QSBhbmQgQiBjb3VudDog', 26 => 'Cg==', 27 => 'QyBBZ2U6IA==', 28 => 'Cg==', 29 => 'QyBwYXJlbnQgYWdlOiA=', 30 => 'Cg==', 31 => 'VGVzdCBTdHJpbmc=', 32 => 'VGhpcwlpcyB0ZXh0Cg==', 33 => 'IEFORCA=', 34 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 35 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 36 => 'RW5jb2RlZCBzdHJpbmc=', 37 => 'VGVzdA==', 38 => 'IGNvbmNhdA==', 39 => 'ISEhIQ==', 40 => 'ISEhIQ==', 41 => 'Cg==', 42 => 'dGV4dA==', 43 => '', 44 => 'Cg==', 45 => 'Cg==', 46 => 'aW5jbHVkZXMucGhw', 47 => 'Cg==', 48 => 'VGVzdCM=', 49 => 'OiA=', 50 => 'SW5jcmVtZW50IG9uY2U=', 51 => 'SW5jcmVtZW50IHR3aWNl', 52 => 'TWVzc2FnZQ==', 53 => 'U3Rpbmc=', 54 => 'TWVzc2FnZQ==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
require_once MyStrings(46);
function _7dd11dab17d25465389c7e78952f($_2145c704ce76dbe5389c7e789417 = 'some text')
{
    global $globalVar;
    echo $_2145c704ce76dbe5389c7e789417 . MyStrings(47);
    $globalVar++;
}
class TheTest
{
    public function _7dd11dab17d25465389c7e789573($_2145c704ce76dbe5389c7e789417 = 'some text2')
    {
        otherFun($_2145c704ce76dbe5389c7e789417);
    }
    public static function _559a9f5ac00a3ae5389c7e7895b7($_2145c704ce76dbe5389c7e789417 = 'some text3')
    {
        global $globalVar;
        global $globalObj;
        $globalObj->field1 = MyStrings(48) . $globalVar . MyStrings(49) . $_2145c704ce76dbe5389c7e789417;
        _7dd11dab17d25465389c7e78952f($globalObj->field1);
    }
}
_7dd11dab17d25465389c7e78952f(MyStrings(50));
_7dd11dab17d25465389c7e78952f(MyStrings(51));
_7dd11dab17d25465389c7e78952f($globalObj->field1);
$_fdc093412ce55f05389c7e789461 = new TheTest();
$_fdc093412ce55f05389c7e789461->_7dd11dab17d25465389c7e789573();
TheTest::_559a9f5ac00a3ae5389c7e7895b7(MyStrings(52));
$globalObj->field1 = MyStrings(53);
TheTest::_559a9f5ac00a3ae5389c7e7895b7(MyStrings(54));
A::method2();