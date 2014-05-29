<?php class A
{
    public $age = 60;
    public static $count = 0;
    public function __construct()
    {
        echo 'A created
';
        self::$count++;
    }
    public function _f6223962daec26353873900a0196()
    {
        echo 'It is method1 from class A
';
    }
    public function __destruct()
    {
        self::$count--;
    }
}
class B extends A
{
    public function _f6223962daec26353873900a0196()
    {
        echo 'It is method1 from class B
';
    }
    public function _f4b14694d49e3be53873900a01d0()
    {
        return self::$count;
    }
}
class C extends B
{
    public $age = 16;
    public function _f4b14694d49e3be53873900a01d0()
    {
        return parent::method2() + 1;
    }
    public static function _bcca39d7a4c54ff53873900a020a()
    {
        echo self::$count . '
';
    }
    public function __get($_0689cc450442b6353873900a00d7)
    {
        if ($_0689cc450442b6353873900a00d7 == 'parent_age') {
            return 'Don\'t know!';
        }
        return null;
    }
}
$_cc179c0f1b6a83153873900a0113 = new A();
echo 'A count: ' . A::$count . '
';
$_cc179c0f1b6a83153873900a0113->_f6223962daec26353873900a0196();
$_cc179c0f1b6a83153873900a0113->age = 167;
echo "A Age: {$_cc179c0f1b6a83153873900a0113->age}\n";
$_2eb5ee6ae2fec3a53873900a0121 = new B();
$_2eb5ee6ae2fec3a53873900a0121->_f6223962daec26353873900a0196();
echo "A and B count: {$_2eb5ee6ae2fec3a53873900a0121->_f4b14694d49e3be53873900a01d0()}\n";
$_a8a009d37b7379553873900a015b = new C();
echo "C Age: {$_a8a009d37b7379553873900a015b->age}\n";
echo "C parent age: {$_a8a009d37b7379553873900a015b->parent_age}\n";
C::_bcca39d7a4c54ff53873900a020a();