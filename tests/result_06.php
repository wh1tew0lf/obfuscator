<?php /**
 * Test for global vars replacement
 */
require_once 'includes.php';
function _3($_4 = 'some text')
{
    global $_6;
    echo $_4 . '
';
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
        $_7->_2 = 'Test#' . $_6 . ': ' . $_4;
        _3($_7->_2);
    }
    public static function _8()
    {
        echo 'TheTest::method2
';
    }
}
_3('Increment once');
_3('Increment twice');
_3($_7->_1);
$_9 = new TheTest();
$_9->_3();
TheTest::_5('Message');
$_7->_1 = 'String';
TheTest::$_2 = 'String2';
TheTest::_5('Message');
A::_8();