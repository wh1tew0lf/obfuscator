<?php /**
 * Test for number replacement
 */
$_7 = 16;
$_8 = 35.5;
$_9 = $_7 * 2;
$_10 = $_8 * 2;
function _4($_5, $_6 = 5)
{
    return $_5 * $_5 + $_6 / 2;
}
$_11 = _4($_7);
$_12 = _4($_7, $_9);
$_13 = _4($_8);
$_14 = _4($_8, $_10);
$_15 = _4($_8, $_7);
class TheTest
{
    public function _1($_2 = 7)
    {
        echo number_format($_2, 2);
    }
    public static function _3($_2 = 9)
    {
        echo number_format($_2, 3);
    }
}
$_16 = new TheTest();
$_16->_1($_11);
$_16->_1($_12);
TheTest::_3($_13);
TheTest::_3($_14);
TheTest::_3($_15);
$_16->_1(_4($_7, $_9));
$_16->_1(_4(77));
TheTest::_3(_4(5));
TheTest::_3(_4($_11, $_11));