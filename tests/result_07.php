<?php function MyStrings($offset)
{
    $strings = array(0 => 'aW5jbHVkZXMucGhw', 1 => 'bG9s', 2 => 'c29tZSB0ZXh0Mw==', 3 => 'ClRlc3Qj', 4 => 'OiA=', 5 => 'Cg==', 6 => 'VGhlVGVzdDo6bWV0aG9kMgo=', 7 => 'VGhpcyBzaG91bGQgYnJva2UgdGVzdCBb', 8 => 'XQo=', 9 => 'Cg==', 10 => 'TWVzc2FnZQ==', 11 => 'TWVzc2FnZQ==', 12 => 'QSBtZXRob2Q6');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
/**
 * Test for global methods replacement
 */
require_once MyStrings(0);
class TheTest
{
    public $_1 = 'lol';
    public static function _2($_3 = 'some text3')
    {
        global $_4;
        global $_5;
        $_5->_1 .= MyStrings(3) . $_4 . MyStrings(4) . $_3;
        echo $_5->_1 . MyStrings(5);
    }
    public static function _6()
    {
        echo MyStrings(6);
    }
    public function _7()
    {
        $_4 = 15;
        echo MyStrings(7) . $_4 . MyStrings(8);
    }
}
echo $_5->_1 . MyStrings(5);
$_8 = new TheTest();
TheTest::_2(MyStrings(10));
TheTest::_6(MyStrings(10));
A::_6();
$_9 = new A();
$_9->_7(MyStrings(12));
$_8->_7();
$_10 = $_8;
$_10->_7();