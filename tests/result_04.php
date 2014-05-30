<?php function MyStrings($offset)
{
    $strings = array(0 => 'VGVzdCBTdHJpbmc=', 1 => 'VGhpcwlpcyB0ZXh0Cg==', 2 => 'IEFORCA=', 3 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 4 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 5 => 'RW5jb2RlZCBzdHJpbmc=', 6 => 'VGVzdA==', 7 => 'IGNvbmNhdA==', 8 => 'ISEhIQ==', 9 => 'ISEhIQ==', 10 => 'Cg==', 11 => 'dGV4dA==', 12 => '', 13 => 'Cg==', 14 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
$_4b57e20fbc154775388cb94cec46 = MyStrings(0);
$_1c0cc8f6fc9aa2d5388cb94cec93 = MyStrings(1);
$_e6dc85bf3c1b3385388cb94cecd8 = "{$_4b57e20fbc154775388cb94cec46} AND {$_1c0cc8f6fc9aa2d5388cb94cec93}";
$_7029542d13c7ad95388cb94ced1e = "    Heredoc text\n    {$_4b57e20fbc154775388cb94cec46}";
$_b820d45aec084af5388cb94ced63 = MyStrings(4);
$_f92a7fe9e639a7b5388cb94ceda9 = _7a575a3f0e1518f5388cb94cefd5(MyStrings(5));
$_175c2daabe76a965388cb94cedee = MyStrings(6) . MyStrings(7);
$_e2da67f3886c63e5388cb94cee33 = MyStrings(8) . $_175c2daabe76a965388cb94cedee . _7a575a3f0e1518f5388cb94cefd5(MyStrings(8));
function _7dd11dab17d25465388cb94cef87($_2145c704ce76dbe5388cb94cee79 = 'some text')
{
    echo "{$_2145c704ce76dbe5388cb94cee79}\n";
    $_1f719e000f5d3f25388cb94ceebf = array(0 => MyStrings(11));
    return isset($_1f719e000f5d3f25388cb94ceebf[1]) ? base64_decode($_1f719e000f5d3f25388cb94ceebf[1]) : MyStrings(12);
}
function _7a575a3f0e1518f5388cb94cefd5($_41bed9aff90c9975388cb94cef06)
{
    return $_41bed9aff90c9975388cb94cef06;
}
class TheTest
{
    public function _7dd11dab17d25465388cb94cf01b($_2145c704ce76dbe5388cb94cee79 = 'some text2')
    {
        echo "{$_2145c704ce76dbe5388cb94cee79}\n";
    }
    public static function _559a9f5ac00a3ae5388cb94cf062($_2145c704ce76dbe5388cb94cee79 = 'some text3')
    {
        echo "{$_2145c704ce76dbe5388cb94cee79}\n";
    }
}
$_98f6d4621d373ca5388cb94cef49 = new TheTest();
$_98f6d4621d373ca5388cb94cef49->_7dd11dab17d25465388cb94cf01b($_4b57e20fbc154775388cb94cec46);
$_98f6d4621d373ca5388cb94cef49->_7dd11dab17d25465388cb94cf01b($_1c0cc8f6fc9aa2d5388cb94cec93);
TheTest::_559a9f5ac00a3ae5388cb94cf062($_e6dc85bf3c1b3385388cb94cecd8);
_7dd11dab17d25465388cb94cef87($_7029542d13c7ad95388cb94ced1e);
_7dd11dab17d25465388cb94cef87($_b820d45aec084af5388cb94ced63);
_7dd11dab17d25465388cb94cef87($_f92a7fe9e639a7b5388cb94ceda9);
_7dd11dab17d25465388cb94cef87($_175c2daabe76a965388cb94cedee);
_7dd11dab17d25465388cb94cef87($_e2da67f3886c63e5388cb94cee33);