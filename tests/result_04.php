<?php /**
 * Test for string obfuscation
 */
$_9 = 'Test String';
$_10 = 'This	is text
';
$_11 = $_9 . ' AND ' . $_10;
$_12 = '    Heredoc text
    ' . $_9;
$_13 = '    Nowdoc text
    $string1';
$_14 = _7('Encoded string');
$_15 = 'Test' . ' concat';
$_16 = '!!!!' . $_15 . _7('!!!!');
function _3($_4 = 'some text')
{
    echo $_4 . '
';
    $_6 = array(0 => 'text');
    return isset($_6[1]) ? base64_decode($_6[1]) : '';
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
        echo $_4 . '
';
    }
    public static function _5($_4 = 'some text3')
    {
        echo $_4 . '
';
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