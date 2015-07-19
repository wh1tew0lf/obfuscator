<?php function MyStrings($_24)
{
    $_25 = array(0 => 'QSBjcmVhdGVkCg==', 1 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEo', 2 => 'KQo=', 3 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 4 => 'Cg==', 5 => 'cGFyZW50X2FnZQ==', 6 => 'RG9uJ3Qga25vdyE=', 7 => 'QSBjb3VudDog', 8 => 'Cg==', 9 => 'QSBBZ2U6IA==', 10 => 'Cg==', 11 => 'QSBhbmQgQiBjb3VudDog', 12 => 'Cg==', 13 => 'QyBBZ2U6IA==', 14 => 'Cg==', 15 => 'QyBwYXJlbnQgYWdlOiA=', 16 => 'Cg==', 17 => 'QiBtZXRob2QgZnJvbSBDOiA=', 18 => 'Cg==', 19 => 'QiBnZXQgcGFyZW50IGFnZTog', 20 => 'Cg==', 21 => 'QiBjb3VudDog', 22 => 'Cg==', 23 => 'QyBtZXRob2QyOiA=', 24 => 'Cg==', 25 => 'VGVzdCA9IA==', 26 => 'Cg==');
    return isset($_25[$_24]) ? base64_decode($_25[$_24]) : '';
}
/**
 * Test for class names and methods replacement
 */
class _0
{
    public $_16 = 60;
    public static $_17 = 0;
    private static $_18 = 6;
    public function __construct()
    {
        echo MyStrings(0);
        self::$_17++;
    }
    public function _3()
    {
        echo MyStrings(1) . self::$_18 . MyStrings(2);
    }
    public function __destruct()
    {
        self::$_17--;
    }
}
class _1 extends _0
{
    public function _3()
    {
        echo MyStrings(3);
    }
    public function _4()
    {
        return self::$_17;
    }
}
class _2 extends _1
{
    public $_16 = 16;
    public function _4()
    {
        return parent::_4() + 1;
    }
    public static function _5()
    {
        echo self::$_17 . MyStrings(4);
    }
    public function __get($_19)
    {
        if ($_19 == MyStrings(5)) {
            return MyStrings(6);
        }
        return null;
    }
}
$_20 = new _0();
$_21 = new _1();
$_22 = new _2();
echo MyStrings(7) . _0::$_17 . MyStrings(4);
$_20->_3();
$_20->_16 = 167;
echo MyStrings(9) . $_20->_16 . MyStrings(4);
$_21->_3();
echo MyStrings(11) . $_21->_4() . MyStrings(4);
echo MyStrings(13) . $_22->_16 . MyStrings(4);
echo MyStrings(15) . $_22->parent_age . MyStrings(4);
echo MyStrings(17) . $_22->_3() . MyStrings(4);
echo MyStrings(19) . $_21->_16 . MyStrings(4);
echo MyStrings(21) . _1::$_17 . MyStrings(4);
echo MyStrings(23) . $_22->_4() . MyStrings(4);
_2::_5();
$_23 = 5;
echo MyStrings(25) . $_23 . MyStrings(4);