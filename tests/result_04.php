<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEK', 17 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 18 => 'Cg==', 19 => 'cGFyZW50X2FnZQ==', 20 => 'RG9uJ3Qga25vdyE=', 21 => 'QSBjb3VudDog', 22 => 'Cg==', 23 => 'QSBBZ2U6IA==', 24 => 'Cg==', 25 => 'QSBhbmQgQiBjb3VudDog', 26 => 'Cg==', 27 => 'QyBBZ2U6IA==', 28 => 'Cg==', 29 => 'QyBwYXJlbnQgYWdlOiA=', 30 => 'Cg==', 31 => 'VGVzdCBTdHJpbmc=', 32 => 'VGhpcwlpcyB0ZXh0Cg==', 33 => 'IEFORCA=', 34 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 35 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 36 => 'RW5jb2RlZCBzdHJpbmc=', 37 => 'VGVzdA==', 38 => 'IGNvbmNhdA==', 39 => 'ISEhIQ==', 40 => 'ISEhIQ==', 41 => 'Cg==', 42 => 'dGV4dA==', 43 => '', 44 => 'Cg==', 45 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
$_4b57e20fbc154775389c7e77272b = MyStrings(31);
$_1c0cc8f6fc9aa2d5389c7e772776 = MyStrings(32);
$_e6dc85bf3c1b3385389c7e7727bb = $_4b57e20fbc154775389c7e77272b . MyStrings(33) . $_1c0cc8f6fc9aa2d5389c7e772776;
$_7029542d13c7ad95389c7e772800 = MyStrings(34) . $_4b57e20fbc154775389c7e77272b;
$_b820d45aec084af5389c7e772844 = MyStrings(35);
$_f92a7fe9e639a7b5389c7e772889 = _7a575a3f0e1518f5389c7e772b38(MyStrings(36));
$_175c2daabe76a965389c7e7728cd = MyStrings(37) . MyStrings(38);
$_e2da67f3886c63e5389c7e772911 = MyStrings(39) . $_175c2daabe76a965389c7e7728cd . _7a575a3f0e1518f5389c7e772b38(MyStrings(40));
function _7dd11dab17d25465389c7e772af4($_2145c704ce76dbe5389c7e772956 = 'some text')
{
    echo $_2145c704ce76dbe5389c7e772956 . MyStrings(41);
    $_1f719e000f5d3f25389c7e77299b = array(0 => MyStrings(42));
    return isset($_1f719e000f5d3f25389c7e77299b[1]) ? base64_decode($_1f719e000f5d3f25389c7e77299b[1]) : MyStrings(43);
}
function _7a575a3f0e1518f5389c7e772b38($_41bed9aff90c9975389c7e7729df)
{
    return $_41bed9aff90c9975389c7e7729df;
}
class TheTest
{
    public function _7dd11dab17d25465389c7e772b7e($_2145c704ce76dbe5389c7e772956 = 'some text2')
    {
        echo $_2145c704ce76dbe5389c7e772956 . MyStrings(44);
    }
    public static function _559a9f5ac00a3ae5389c7e772bc3($_2145c704ce76dbe5389c7e772956 = 'some text3')
    {
        echo $_2145c704ce76dbe5389c7e772956 . MyStrings(45);
    }
}
$_98f6d4621d373ca5389c7e772a24 = new TheTest();
$_98f6d4621d373ca5389c7e772a24->_7dd11dab17d25465389c7e772b7e($_4b57e20fbc154775389c7e77272b);
$_98f6d4621d373ca5389c7e772a24->_7dd11dab17d25465389c7e772b7e($_1c0cc8f6fc9aa2d5389c7e772776);
TheTest::_559a9f5ac00a3ae5389c7e772bc3($_e6dc85bf3c1b3385389c7e7727bb);
_7dd11dab17d25465389c7e772af4($_7029542d13c7ad95389c7e772800);
_7dd11dab17d25465389c7e772af4($_b820d45aec084af5389c7e772844);
_7dd11dab17d25465389c7e772af4($_f92a7fe9e639a7b5389c7e772889);
_7dd11dab17d25465389c7e772af4($_175c2daabe76a965389c7e7728cd);
_7dd11dab17d25465389c7e772af4($_e2da67f3886c63e5389c7e772911);