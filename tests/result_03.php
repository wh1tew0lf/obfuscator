<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEK', 17 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 18 => 'Cg==', 19 => 'cGFyZW50X2FnZQ==', 20 => 'RG9uJ3Qga25vdyE=', 21 => 'QSBjb3VudDog', 22 => 'Cg==', 23 => 'QSBBZ2U6IA==', 24 => 'Cg==', 25 => 'QSBhbmQgQiBjb3VudDog', 26 => 'Cg==', 27 => 'QyBBZ2U6IA==', 28 => 'Cg==', 29 => 'QyBwYXJlbnQgYWdlOiA=', 30 => 'Cg==', 31 => 'QiBtZXRob2QgZnJvbSBDOiA=', 32 => 'Cg==', 33 => 'QiBnZXQgcGFyZW50IGFnZTog', 34 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
/**
 * Test for class names and methods replacement
 */
class A
{
    public $_4 = 60;
    public static $_5 = 0;
    public function __construct()
    {
        echo MyStrings(15);
        self::$_5++;
    }
    public function _6()
    {
        echo MyStrings(16);
    }
    public function __destruct()
    {
        self::$_5--;
    }
}
class B extends A
{
    public function _6()
    {
        echo MyStrings(17);
    }
    public function _7()
    {
        return self::$_5;
    }
}
class C extends B
{
    public $_4 = 16;
    public function _7()
    {
        return parent::method2() + 1;
    }
    public static function _8()
    {
        echo self::$_5 . MyStrings(18);
    }
    public function __get($_0)
    {
        if ($_0 == MyStrings(19)) {
            return MyStrings(20);
        }
        return null;
    }
}
$_1 = new A();
$_2 = new B();
$_3 = new C();
echo MyStrings(21) . A::$_5 . MyStrings(22);
$_1->_6();
$_1->_4 = 167;
echo MyStrings(23) . $_1->_4 . MyStrings(24);
$_2->_6();
echo MyStrings(25) . $_2->_7() . MyStrings(26);
echo MyStrings(27) . $_3->_4 . MyStrings(28);
echo MyStrings(29) . $_3->parent_age . MyStrings(30);
echo MyStrings(31) . $_3->_6() . MyStrings(32);
echo MyStrings(33) . $_2->_4 . MyStrings(34);
C::_8();