<?php function MyStrings($offset)
{
    $strings = array(0 => 'QSBjcmVhdGVkCg==', 1 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEo', 2 => 'KQo=', 3 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 4 => 'Cg==', 5 => 'cGFyZW50X2FnZQ==', 6 => 'RG9uJ3Qga25vdyE=', 7 => 'QSBjb3VudDog', 8 => 'Cg==', 9 => 'QSBBZ2U6IA==', 10 => 'Cg==', 11 => 'QSBhbmQgQiBjb3VudDog', 12 => 'Cg==', 13 => 'QyBBZ2U6IA==', 14 => 'Cg==', 15 => 'QyBwYXJlbnQgYWdlOiA=', 16 => 'Cg==', 17 => 'QiBtZXRob2QgZnJvbSBDOiA=', 18 => 'Cg==', 19 => 'QiBnZXQgcGFyZW50IGFnZTog', 20 => 'Cg==', 21 => 'QiBjb3VudDog', 22 => 'Cg==', 23 => 'QyBtZXRob2QyOiA=', 24 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
/**
 * Test for class names and methods replacement
 */
class A
{
    public $_1 = 60;
    public static $_2 = 0;
    private static $_3 = 6;
    public function __construct()
    {
        echo MyStrings(0);
        self::$_2++;
    }
    public function _4()
    {
        echo MyStrings(1) . self::$_3 . MyStrings(2);
    }
    public function __destruct()
    {
        self::$_2--;
    }
}
class B extends A
{
    public function _4()
    {
        echo MyStrings(3);
    }
    public function _6()
    {
        return self::$_2;
    }
}
class C extends B
{
    public $_1 = 16;
    public function _6()
    {
        return parent::_6() + 1;
    }
    public static function _8()
    {
        echo self::$_2 . MyStrings(4);
    }
    public function __get($_9)
    {
        if ($_9 == MyStrings(5)) {
            return MyStrings(6);
        }
        return null;
    }
}
$_10 = new A();
$_11 = new B();
$_12 = new C();
echo MyStrings(7) . A::$_2 . MyStrings(4);
$_10->_4();
$_10->_1 = 167;
echo MyStrings(9) . $_10->_1 . MyStrings(4);
$_11->_4();
echo MyStrings(11) . $_11->_6() . MyStrings(4);
echo MyStrings(13) . $_12->_1 . MyStrings(4);
echo MyStrings(15) . $_12->parent_age . MyStrings(4);
echo MyStrings(17) . $_12->_4() . MyStrings(4);
echo MyStrings(19) . $_11->_1 . MyStrings(4);
echo MyStrings(21) . B::$_2 . MyStrings(4);
echo MyStrings(23) . $_12->_6() . MyStrings(4);
C::_8();