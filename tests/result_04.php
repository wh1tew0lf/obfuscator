<?php function MyStrings($offset)
{
    $strings = array(0 => 'VGVzdCBTdHJpbmc=', 1 => 'VGhpcwlpcyB0ZXh0Cg==', 2 => 'IEFORCA=', 3 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 4 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 5 => 'RW5jb2RlZCBzdHJpbmc=', 6 => 'VGVzdA==', 7 => 'IGNvbmNhdA==', 8 => 'ISEhIQ==', 9 => 'ISEhIQ==', 10 => 'Cg==', 11 => 'dGV4dA==', 12 => '', 13 => 'Cg==', 14 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
$_4b57e20fbc154775389ba1608e46 = MyStrings(0);
$_1c0cc8f6fc9aa2d5389ba1608e91 = MyStrings(1);
$_e6dc85bf3c1b3385389ba1608ed6 = $_4b57e20fbc154775389ba1608e46 . MyStrings(2) . $_1c0cc8f6fc9aa2d5389ba1608e91;
$_7029542d13c7ad95389ba1608f1a = MyStrings(3) . $_4b57e20fbc154775389ba1608e46;
$_b820d45aec084af5389ba1608f5e = MyStrings(4);
$_f92a7fe9e639a7b5389ba1608fa2 = _7a575a3f0e1518f5389ba16091c5(MyStrings(5));
$_175c2daabe76a965389ba1608fe6 = MyStrings(6) . MyStrings(7);
$_e2da67f3886c63e5389ba160902a = MyStrings(8) . $_175c2daabe76a965389ba1608fe6 . _7a575a3f0e1518f5389ba16091c5(MyStrings(9));
function _7dd11dab17d25465389ba1609181($_2145c704ce76dbe5389ba160906f = 'some text')
{
    echo $_2145c704ce76dbe5389ba160906f . MyStrings(10);
    $_1f719e000f5d3f25389ba16090b3 = array(0 => MyStrings(11));
    return isset($_1f719e000f5d3f25389ba16090b3[1]) ? base64_decode($_1f719e000f5d3f25389ba16090b3[1]) : MyStrings(12);
}
function _7a575a3f0e1518f5389ba16091c5($_41bed9aff90c9975389ba16090f7)
{
    return $_41bed9aff90c9975389ba16090f7;
}
class TheTest
{
    public function _7dd11dab17d25465389ba160920b($_2145c704ce76dbe5389ba160906f = 'some text2')
    {
        echo $_2145c704ce76dbe5389ba160906f . MyStrings(13);
    }
    public static function _559a9f5ac00a3ae5389ba1609251($_2145c704ce76dbe5389ba160906f = 'some text3')
    {
        echo $_2145c704ce76dbe5389ba160906f . MyStrings(14);
    }
}
$_98f6d4621d373ca5389ba160913b = new TheTest();
$_98f6d4621d373ca5389ba160913b->_7dd11dab17d25465389ba160920b($_4b57e20fbc154775389ba1608e46);
$_98f6d4621d373ca5389ba160913b->_7dd11dab17d25465389ba160920b($_1c0cc8f6fc9aa2d5389ba1608e91);
TheTest::_559a9f5ac00a3ae5389ba1609251($_e6dc85bf3c1b3385389ba1608ed6);
_7dd11dab17d25465389ba1609181($_7029542d13c7ad95389ba1608f1a);
_7dd11dab17d25465389ba1609181($_b820d45aec084af5389ba1608f5e);
_7dd11dab17d25465389ba1609181($_f92a7fe9e639a7b5389ba1608fa2);
_7dd11dab17d25465389ba1609181($_175c2daabe76a965389ba1608fe6);
_7dd11dab17d25465389ba1609181($_e2da67f3886c63e5389ba160902a);