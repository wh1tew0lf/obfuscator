<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEo', 17 => 'KQo=', 18 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 19 => 'Cg==', 20 => 'cGFyZW50X2FnZQ==', 21 => 'RG9uJ3Qga25vdyE=', 22 => 'QSBjb3VudDog', 23 => 'Cg==', 24 => 'QSBBZ2U6IA==', 25 => 'Cg==', 26 => 'QSBhbmQgQiBjb3VudDog', 27 => 'Cg==', 28 => 'QyBBZ2U6IA==', 29 => 'Cg==', 30 => 'QyBwYXJlbnQgYWdlOiA=', 31 => 'Cg==', 32 => 'QiBtZXRob2QgZnJvbSBDOiA=', 33 => 'Cg==', 34 => 'QiBnZXQgcGFyZW50IGFnZTog', 35 => 'Cg==', 36 => 'QiBjb3VudDog', 37 => 'Cg==', 38 => 'QyBtZXRob2QyOiA=', 39 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
/**
 * Test for class names and methods replacement
 */
class A
{
    public $_4 = 60;
    public static $_5 = 0;
    private static $_6 = 6;
    public function __construct()
    {
        echo MyStrings(15);
        self::$_5++;
    }
    public function _7()
    {
        echo MyStrings(16) . self::$_6 . MyStrings(17);
    }
    public function __destruct()
    {
        self::$_5--;
    }
}
class B extends A
{
    public function _7()
    {
        echo MyStrings(18);
    }
    public function _8()
    {
        return self::$_5;
    }
}
class C extends B
{
    public $_4 = 16;
    public function _8()
    {
        return parent::method2() + 1;
    }
    public static function _9()
    {
        echo self::$_5 . MyStrings(19);
    }
    public function __get($_0)
    {
        if ($_0 == MyStrings(20)) {
            return MyStrings(21);
        }
        return null;
    }
}
$_1 = new A();
$_2 = new B();
$_3 = new C();
echo MyStrings(22) . A::$_5 . MyStrings(23);
$_1->_7();
$_1->_4 = 167;
echo MyStrings(24) . $_1->_4 . MyStrings(25);
$_2->_7();
echo MyStrings(26) . $_2->_8() . MyStrings(27);
echo MyStrings(28) . $_3->_4 . MyStrings(29);
echo MyStrings(30) . $_3->parent_age . MyStrings(31);
echo MyStrings(32) . $_3->_7() . MyStrings(33);
echo MyStrings(34) . $_2->_4 . MyStrings(35);
echo MyStrings(36) . B::$_5 . MyStrings(37);
echo MyStrings(38) . $_3->_8() . MyStrings(39);
C::_9();