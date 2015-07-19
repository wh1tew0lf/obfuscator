<?php function MyStrings($_55)
{
    $_56 = array(0 => 'aW5jbHVkZXMucGhw', 1 => 'c29tZSB0ZXh0', 2 => 'Cg==', 3 => 'bG9s', 4 => 'c3RhdGlj', 5 => 'c29tZSB0ZXh0Mg==', 6 => 'c29tZSB0ZXh0Mw==', 7 => 'VGVzdCM=', 8 => 'OiA=', 9 => 'VGhlVGVzdDo6bWV0aG9kMgo=', 10 => 'SW5jcmVtZW50IG9uY2U=', 11 => 'SW5jcmVtZW50IHR3aWNl', 12 => 'TWVzc2FnZQ==', 13 => 'U3RyaW5n', 14 => 'U3RyaW5nMg==', 15 => 'TWVzc2FnZQ==');
    return isset($_56[$_55]) ? base64_decode($_56[$_55]) : '';
}
/**
 * Test for global vars replacement
 */
require_once MyStrings(0);
function _7($_20 = 'some text')
{
    global $_52;
    echo $_20 . MyStrings(2);
    $_52++;
}
class _3
{
    public $_29 = 'lol';
    public static $_30 = 'static';
    public function _7($_20 = 'some text2')
    {
        otherFun($_20);
    }
    public static function _8($_20 = 'some text3')
    {
        global $_52;
        global $_53;
        $_53->_30 = MyStrings(7) . $_52 . MyStrings(8) . $_20;
        _7($_53->_30);
    }
    public static function _5()
    {
        echo MyStrings(9);
    }
}
_7(MyStrings(10));
_7(MyStrings(11));
_7($_53->_29);
$_54 = new _3();
$_54->_7();
_3::_8(MyStrings(12));
$_53->_29 = MyStrings(13);
_3::$_30 = MyStrings(14);
_3::_8(MyStrings(12));
_0::_5();