<?php function MyStrings($offset)
{
    $strings = array(0 => 'VGVzdCBTdHJpbmc=', 1 => 'VGhpcwlpcyB0ZXh0Cg==', 2 => 'IEFORCA=', 3 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 4 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 5 => 'RW5jb2RlZCBzdHJpbmc=', 6 => 'VGVzdA==', 7 => 'IGNvbmNhdA==', 8 => 'ISEhIQ==', 9 => 'ISEhIQ==', 10 => 'c29tZSB0ZXh0', 11 => 'Cg==', 12 => 'dGV4dA==', 13 => '', 14 => 'ZmllbGQx', 15 => 'ZmllbGQy', 16 => 'c29tZSB0ZXh0Mg==', 17 => 'Cg==', 18 => 'c29tZSB0ZXh0Mw==', 19 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
/**
 * Test for string obfuscation
 */
$_9 = MyStrings(0);
$_10 = MyStrings(1);
$_11 = $_9 . MyStrings(2) . $_10;
$_12 = MyStrings(3) . $_9;
$_13 = MyStrings(4);
$_14 = _7(MyStrings(5));
$_15 = MyStrings(6) . MyStrings(7);
$_16 = MyStrings(8) . $_15 . _7(MyStrings(8));
function _3($_4 = 'some text')
{
    echo $_4 . MyStrings(11);
    $_6 = array(0 => MyStrings(12));
    return isset($_6[1]) ? base64_decode($_6[1]) : MyStrings(13);
}
function _7($_8)
{
    return $_8;
}
class TheTest
{
    public $_1 = 'field1';
    public static $_2 = 'field2';
    public function _3($_4 = 'some text2')
    {
        echo $_4 . MyStrings(11);
    }
    public static function _5($_4 = 'some text3')
    {
        echo $_4 . MyStrings(11);
    }
}
$_17 = new TheTest();
$_17->_3($_9);
$_17->_3($_10);
TheTest::_5($_11);
_3($_12);
_3($_13);
_3($_14);
_3($_15);
_3($_16);