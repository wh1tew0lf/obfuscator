<?php function MyStrings($offset)
{
    $strings = array(0 => 'aW5jbHVkZXMucGhw', 1 => 'c29tZSB0ZXh0', 2 => 'Cg==', 3 => 'bG9s', 4 => 'c3RhdGlj', 5 => 'c29tZSB0ZXh0Mg==', 6 => 'c29tZSB0ZXh0Mw==', 7 => 'VGVzdCM=', 8 => 'OiA=', 9 => 'VGhlVGVzdDo6bWV0aG9kMgo=', 10 => 'SW5jcmVtZW50IG9uY2U=', 11 => 'SW5jcmVtZW50IHR3aWNl', 12 => 'TWVzc2FnZQ==', 13 => 'U3RyaW5n', 14 => 'U3RyaW5nMg==', 15 => 'TWVzc2FnZQ==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
/**
 * Test for global vars replacement
 */
require_once MyStrings(0);
function _3($_4 = 'some text')
{
    global $_6;
    echo $_4 . MyStrings(2);
    $_6++;
}
class TheTest
{
    public $_1 = 'lol';
    public static $_2 = 'static';
    public function _3($_4 = 'some text2')
    {
        otherFun($_4);
    }
    public static function _5($_4 = 'some text3')
    {
        global $_6;
        global $_7;
        $_7->_2 = MyStrings(7) . $_6 . MyStrings(8) . $_4;
        _3($_7->_2);
    }
    public static function _8()
    {
        echo MyStrings(9);
    }
}
_3(MyStrings(10));
_3(MyStrings(11));
_3($_7->_1);
$_9 = new TheTest();
$_9->_3();
TheTest::_5(MyStrings(12));
$_7->_1 = MyStrings(13);
TheTest::$_2 = MyStrings(14);
TheTest::_5(MyStrings(12));
A::_8();