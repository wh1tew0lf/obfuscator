<?php function MyStrings($_56)
{
    $_57 = array(0 => 'aW5jbHVkZXMucGhw', 1 => 'bG9s', 2 => 'c29tZSB0ZXh0Mw==', 3 => 'ClRlc3Qj', 4 => 'OiA=', 5 => 'Cg==', 6 => 'VGhlVGVzdDo6bWV0aG9kMgo=', 7 => 'VGhpcyBzaG91bGQgYnJva2UgdGVzdCBb', 8 => 'XQo=', 9 => 'Cg==', 10 => 'TWVzc2FnZQ==', 11 => 'TWVzc2FnZQ==', 12 => 'QSBtZXRob2Q6');
    return isset($_57[$_56]) ? base64_decode($_57[$_56]) : '';
}
/**
 * Test for global methods replacement
 */
require_once MyStrings(0);
class _3
{
    public $_29 = 'lol';
    public static function _8($_20 = 'some text3')
    {
        global $_52;
        global $_53;
        $_53->_29 .= MyStrings(3) . $_52 . MyStrings(4) . $_20;
        echo $_53->_29 . MyStrings(5);
    }
    public static function _5()
    {
        echo MyStrings(6);
    }
    public function _4()
    {
        $_52 = 15;
        echo MyStrings(7) . $_52 . MyStrings(8);
    }
}
echo $_53->_29 . MyStrings(5);
$_54 = new _3();
_3::_8(MyStrings(10));
_3::_5(MyStrings(10));
_0::_5();
$_25 = new _0();
$_25->_4(MyStrings(12));
$_54->_4();
$_55 = $_54;
$_55->_4();