<?php function MyStrings($offset)
{
    $strings = array(0 => 'VmFyaWFibGUx', 1 => 'ICsr', 2 => 'JHZhcmlhYmxlMSArKw==', 3 => 'Lg==', 4 => 'Cg==', 5 => 'IGFuZCA=', 6 => 'Cg==', 7 => 'dmFyMQ==', 8 => 'dmFyMg==', 9 => 'dmFyMw==', 10 => 'Ww==', 11 => 'XSA9PiB7', 12 => 'fQo=', 13 => 'RnVuY3Rpb24xCg==', 14 => 'Cg==', 15 => 'QSBjcmVhdGVkCg==', 16 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEEK', 17 => 'SXQgaXMgbWV0aG9kMSBmcm9tIGNsYXNzIEIK', 18 => 'Cg==', 19 => 'cGFyZW50X2FnZQ==', 20 => 'RG9uJ3Qga25vdyE=', 21 => 'QSBjb3VudDog', 22 => 'Cg==', 23 => 'QSBBZ2U6IA==', 24 => 'Cg==', 25 => 'QSBhbmQgQiBjb3VudDog', 26 => 'Cg==', 27 => 'QyBBZ2U6IA==', 28 => 'Cg==', 29 => 'QyBwYXJlbnQgYWdlOiA=', 30 => 'Cg==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
class A
{
    public $_d63775668ed6d4153a6338306921 = 60;
    public static $_29424780e223b2153a63383069c5 = 0;
    public function __construct()
    {
        echo MyStrings(15);
        self::$_29424780e223b2153a63383069c5++;
    }
    public function _f6223962daec26353a6338306a86()
    {
        echo MyStrings(16);
    }
    public function __destruct()
    {
        self::$_29424780e223b2153a63383069c5--;
    }
}
class B extends A
{
    public function _f6223962daec26353a6338306a86()
    {
        echo MyStrings(17);
    }
    public function _f4b14694d49e3be53a6338306b43()
    {
        return self::$_29424780e223b2153a63383069c5;
    }
}
class C extends B
{
    public $_d63775668ed6d4153a6338306921 = 16;
    public function _f4b14694d49e3be53a6338306b43()
    {
        return parent::method2() + 1;
    }
    public static function _bcca39d7a4c54ff53a6338306bf1()
    {
        echo self::$_29424780e223b2153a63383069c5 . MyStrings(18);
    }
    public function __get($_0689cc450442b6353a6338306650)
    {
        if ($_0689cc450442b6353a6338306650 == MyStrings(19)) {
            return MyStrings(20);
        }
        return null;
    }
}
$_cc179c0f1b6a83153a63383066fd = new A();
echo MyStrings(21) . A::$_29424780e223b2153a63383069c5 . MyStrings(22);
$_cc179c0f1b6a83153a63383066fd->_f6223962daec26353a6338306a86();
$_cc179c0f1b6a83153a63383066fd->_d63775668ed6d4153a6338306921 = 167;
echo MyStrings(23) . $_cc179c0f1b6a83153a63383066fd->_d63775668ed6d4153a6338306921 . MyStrings(24);
$_2eb5ee6ae2fec3a53a63383067a0 = new B();
$_2eb5ee6ae2fec3a53a63383067a0->_f6223962daec26353a6338306a86();
echo MyStrings(25) . $_2eb5ee6ae2fec3a53a63383067a0->_f4b14694d49e3be53a6338306b43() . MyStrings(26);
$_a8a009d37b7379553a633830685e = new C();
echo MyStrings(27) . $_a8a009d37b7379553a633830685e->_d63775668ed6d4153a6338306921 . MyStrings(28);
echo MyStrings(29) . $_a8a009d37b7379553a633830685e->parent_age . MyStrings(30);
C::_bcca39d7a4c54ff53a6338306bf1();