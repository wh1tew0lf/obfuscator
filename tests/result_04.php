<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEK', 17 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 18 => 'Cg==', 19 => 'cGFyZW50X2FnZQ==', 20 => 'RG9uJ3Qga25vdyE=', 21 => 'QSBjb3VudDog', 22 => 'Cg==', 23 => 'QSBBZ2U6IA==', 24 => 'Cg==', 25 => 'QSBhbmQgQiBjb3VudDog', 26 => 'Cg==', 27 => 'QyBBZ2U6IA==', 28 => 'Cg==', 29 => 'QyBwYXJlbnQgYWdlOiA=', 30 => 'Cg==', 31 => 'VGVzdCBTdHJpbmc=', 32 => 'VGhpcwlpcyB0ZXh0Cg==', 33 => 'IEFORCA=', 34 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 35 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 36 => 'RW5jb2RlZCBzdHJpbmc=', 37 => 'VGVzdA==', 38 => 'IGNvbmNhdA==', 39 => 'ISEhIQ==', 40 => 'ISEhIQ==', 41 => 'Cg==', 42 => 'dGV4dA==', 43 => '', 44 => 'ZmllbGQx', 45 => 'ZmllbGQy', 46 => 'Cg==', 47 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
$_4b57e20fbc1547753a63383679f8 = MyStrings(31);
$_1c0cc8f6fc9aa2d53a6338367ab7 = MyStrings(32);
$_e6dc85bf3c1b33853a6338367b56 = $_4b57e20fbc1547753a63383679f8 . MyStrings(33) . $_1c0cc8f6fc9aa2d53a6338367ab7;
$_7029542d13c7ad953a6338367bfb = MyStrings(34) . $_4b57e20fbc1547753a63383679f8;
$_b820d45aec084af53a6338367cb7 = MyStrings(35);
$_f92a7fe9e639a7b53a6338367d72 = _7a575a3f0e1518f53a6338368653(MyStrings(36));
$_175c2daabe76a9653a6338367e29 = MyStrings(37) . MyStrings(38);
$_e2da67f3886c63e53a6338367ede = MyStrings(39) . $_175c2daabe76a9653a6338367e29 . _7a575a3f0e1518f53a6338368653(MyStrings(40));
function _7dd11dab17d254653a633836859a($_2145c704ce76dbe53a6338367f8e = 'some text')
{
    echo $_2145c704ce76dbe53a6338367f8e . MyStrings(41);
    $_1f719e000f5d3f253a63383680ac = array(0 => MyStrings(42));
    return isset($_1f719e000f5d3f253a63383680ac[1]) ? base64_decode($_1f719e000f5d3f253a63383680ac[1]) : MyStrings(43);
}
function _7a575a3f0e1518f53a6338368653($_41bed9aff90c99753a6338368172)
{
    return $_41bed9aff90c99753a6338368172;
}
class TheTest
{
    public $_e41e17ec0b936e053a633836842c = 'field1';
    public static $_e66ec8f3198a3da53a63383684d3 = 'field2';
    public function _7dd11dab17d254653a633836870b($_2145c704ce76dbe53a6338367f8e = 'some text2')
    {
        echo $_2145c704ce76dbe53a6338367f8e . MyStrings(46);
    }
    public static function _559a9f5ac00a3ae53a63383687f0($_2145c704ce76dbe53a6338367f8e = 'some text3')
    {
        echo $_2145c704ce76dbe53a6338367f8e . MyStrings(47);
    }
}
$_98f6d4621d373ca53a6338368213 = new TheTest();
$_98f6d4621d373ca53a6338368213->_7dd11dab17d254653a633836870b($_4b57e20fbc1547753a63383679f8);
$_98f6d4621d373ca53a6338368213->_7dd11dab17d254653a633836870b($_1c0cc8f6fc9aa2d53a6338367ab7);
TheTest::_559a9f5ac00a3ae53a63383687f0($_e6dc85bf3c1b33853a6338367b56);
_7dd11dab17d254653a633836859a($_7029542d13c7ad953a6338367bfb);
_7dd11dab17d254653a633836859a($_b820d45aec084af53a6338367cb7);
_7dd11dab17d254653a633836859a($_f92a7fe9e639a7b53a6338367d72);
_7dd11dab17d254653a633836859a($_175c2daabe76a9653a6338367e29);
_7dd11dab17d254653a633836859a($_e2da67f3886c63e53a6338367ede);