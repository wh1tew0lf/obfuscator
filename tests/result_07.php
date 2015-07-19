<?php /**
 * Test for global methods replacement
 */
require_once 'includes.php';
class TheTest
{
    public $_1 = 'lol';
    public static function _2($_3 = 'some text3')
    {
        global $_4;
        global $_5;
        $_5->_1 .= '
Test#' . $_4 . ': ' . $_3;
        echo $_5->_1 . '
';
    }
    public static function _6()
    {
        echo 'TheTest::method2
';
    }
    public function _7()
    {
        $_4 = 15;
        echo 'This should broke test [' . $_4 . ']
';
    }
}
echo $_5->_1 . '
';
$_8 = new TheTest();
TheTest::_2('Message');
TheTest::_6('Message');
A::_6();
$_9 = new A();
$_9->_7('A method:');
$_8->_7();
$_10 = $_8;
$_10->_7();