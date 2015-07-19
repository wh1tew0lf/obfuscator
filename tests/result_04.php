<?php function MyStrings($_40)
{
    $_41 = array(0 => 'VGVzdCBTdHJpbmc=', 1 => 'VGhpcwlpcyB0ZXh0Cg==', 2 => 'IEFORCA=', 3 => 'ICAgIEhlcmVkb2MgdGV4dAogICAg', 4 => 'ICAgIE5vd2RvYyB0ZXh0CiAgICAkc3RyaW5nMQ==', 5 => 'RW5jb2RlZCBzdHJpbmc=', 6 => 'VGVzdA==', 7 => 'IGNvbmNhdA==', 8 => 'ISEhIQ==', 9 => 'ISEhIQ==', 10 => 'c29tZSB0ZXh0', 11 => 'Cg==', 12 => 'dGV4dA==', 13 => '', 14 => 'ZmllbGQx', 15 => 'ZmllbGQy', 16 => 'c29tZSB0ZXh0Mg==', 17 => 'Cg==', 18 => 'c29tZSB0ZXh0Mw==', 19 => 'Cg==');
    return isset($_41[$_40]) ? base64_decode($_41[$_40]) : '';
}
/**
 * Test for string obfuscation
 */
$_31 = MyStrings(0);
$_32 = MyStrings(1);
$_33 = $_31 . MyStrings(2) . $_32;
$_34 = MyStrings(3) . $_31;
$_35 = MyStrings(4);
$_36 = _11(MyStrings(5));
$_37 = MyStrings(6) . MyStrings(7);
$_38 = MyStrings(8) . $_37 . _11(MyStrings(8));
function _7($_19 = 'some text')
{
    echo $_19 . MyStrings(11);
    $_16 = array(0 => MyStrings(12));
    return isset($_16[1]) ? base64_decode($_16[1]) : MyStrings(13);
}
function _11($_30)
{
    return $_30;
}
class _3
{
    public $_28 = 'field1';
    public static $_29 = 'field2';
    public function _7($_19 = 'some text2')
    {
        echo $_19 . MyStrings(11);
    }
    public static function _8($_19 = 'some text3')
    {
        echo $_19 . MyStrings(11);
    }
}
$_39 = new _3();
$_39->_7($_31);
$_39->_7($_32);
_3::_8($_33);
_7($_34);
_7($_35);
_7($_36);
_7($_37);
_7($_38);