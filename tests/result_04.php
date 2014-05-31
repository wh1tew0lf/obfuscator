<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEK', 17 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 18 => 'Cg==', 19 => 'cGFyZW50X2FnZQ==', 20 => 'RG9uJ3Qga25vdyE=', 21 => 'QSBjb3VudDog', 22 => 'Cg==', 23 => 'QSBBZ2U6IA==', 24 => 'Cg==', 25 => 'QSBhbmQgQiBjb3VudDog', 26 => 'Cg==', 27 => 'QyBBZ2U6IA==', 28 => 'Cg==', 29 => 'QyBwYXJlbnQgYWdlOiA=', 30 => 'Cg==', 31 => 'VGVzdCBTdHJpbmc=', 32 => 'VGhpcwlpcyB0ZXh0Cg==', 33 => 'IEFORCA=', 34 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 35 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 36 => 'RW5jb2RlZCBzdHJpbmc=', 37 => 'VGVzdA==', 38 => 'IGNvbmNhdA==', 39 => 'ISEhIQ==', 40 => 'ISEhIQ==', 41 => 'Cg==', 42 => 'dGV4dA==', 43 => '', 44 => 'ZmllbGQx', 45 => 'ZmllbGQy', 46 => 'Cg==', 47 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
$_4b57e20fbc154775389ca9ecefc3 = MyStrings(31);
$_1c0cc8f6fc9aa2d5389ca9ecefff = MyStrings(32);
$_e6dc85bf3c1b3385389ca9ecf039 = $_4b57e20fbc154775389ca9ecefc3 . MyStrings(33) . $_1c0cc8f6fc9aa2d5389ca9ecefff;
$_7029542d13c7ad95389ca9ecf072 = MyStrings(34) . $_4b57e20fbc154775389ca9ecefc3;
$_b820d45aec084af5389ca9ecf0ac = MyStrings(35);
$_f92a7fe9e639a7b5389ca9ecf0e5 = _7a575a3f0e1518f5389ca9ecf399(MyStrings(36));
$_175c2daabe76a965389ca9ecf11f = MyStrings(37) . MyStrings(38);
$_e2da67f3886c63e5389ca9ecf158 = MyStrings(39) . $_175c2daabe76a965389ca9ecf11f . _7a575a3f0e1518f5389ca9ecf399(MyStrings(40));
function _7dd11dab17d25465389ca9ecf35f($_2145c704ce76dbe5389ca9ecf192 = 'some text')
{
    echo $_2145c704ce76dbe5389ca9ecf192 . MyStrings(41);
    $_1f719e000f5d3f25389ca9ecf1cb = array(0 => MyStrings(42));
    return isset($_1f719e000f5d3f25389ca9ecf1cb[1]) ? base64_decode($_1f719e000f5d3f25389ca9ecf1cb[1]) : MyStrings(43);
}
function _7a575a3f0e1518f5389ca9ecf399($_41bed9aff90c9975389ca9ecf205)
{
    return $_41bed9aff90c9975389ca9ecf205;
}
class TheTest
{
    public $_e41e17ec0b936e05389ca9ecf2ec = 'field1';
    public static $_e66ec8f3198a3da5389ca9ecf325 = 'field2';
    public function _7dd11dab17d25465389ca9ecf3d3($_2145c704ce76dbe5389ca9ecf192 = 'some text2')
    {
        echo $_2145c704ce76dbe5389ca9ecf192 . MyStrings(46);
    }
    public static function _559a9f5ac00a3ae5389ca9ecf40c($_2145c704ce76dbe5389ca9ecf192 = 'some text3')
    {
        echo $_2145c704ce76dbe5389ca9ecf192 . MyStrings(47);
    }
}
$_98f6d4621d373ca5389ca9ecf23e = new TheTest();
$_98f6d4621d373ca5389ca9ecf23e->_7dd11dab17d25465389ca9ecf3d3($_4b57e20fbc154775389ca9ecefc3);
$_98f6d4621d373ca5389ca9ecf23e->_7dd11dab17d25465389ca9ecf3d3($_1c0cc8f6fc9aa2d5389ca9ecefff);
TheTest::_559a9f5ac00a3ae5389ca9ecf40c($_e6dc85bf3c1b3385389ca9ecf039);
_7dd11dab17d25465389ca9ecf35f($_7029542d13c7ad95389ca9ecf072);
_7dd11dab17d25465389ca9ecf35f($_b820d45aec084af5389ca9ecf0ac);
_7dd11dab17d25465389ca9ecf35f($_f92a7fe9e639a7b5389ca9ecf0e5);
_7dd11dab17d25465389ca9ecf35f($_175c2daabe76a965389ca9ecf11f);
_7dd11dab17d25465389ca9ecf35f($_e2da67f3886c63e5389ca9ecf158);