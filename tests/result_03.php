<?php class A
{
    public $_d63775668ed6d415387264504e61 = 60;
    public static $_29424780e223b215387264504eae = 0;
    public function __construct()
    {
        echo 'A created
';
        self::$_29424780e223b215387264504eae++;
    }
    public function _f6223962daec263538726450500a()
    {
        echo 'It is method1 from class A
';
    }
    public function __destruct()
    {
        self::$_29424780e223b215387264504eae--;
    }
}
class B extends A
{
    public function _f6223962daec263538726450500a()
    {
        echo 'It is method1 from class B
';
    }
    public function _f4b14694d49e3be538726450504f()
    {
        return self::$_29424780e223b215387264504eae;
    }
}
class C extends B
{
    public $_d63775668ed6d415387264504e61 = 16;
    public function _f4b14694d49e3be538726450504f()
    {
        return parent::method2() + 1;
    }
    public static function _bcca39d7a4c54ff5387264505095()
    {
        echo self::$_29424780e223b215387264504eae . '
';
    }
    public function __get($_0689cc450442b635387264504ef4)
    {
        if ($_0689cc450442b635387264504ef4 == 'parent_age') {
            return 'Don\'t know!';
        }
        return null;
    }
}
$_cc179c0f1b6a8315387264504f3a = new A();
echo 'A count: ' . A::$_29424780e223b215387264504eae . '
';
$_cc179c0f1b6a8315387264504f3a->_f6223962daec263538726450500a();
$_cc179c0f1b6a8315387264504f3a->_d63775668ed6d415387264504e61 = 167;
echo "A Age: {$_cc179c0f1b6a8315387264504f3a->_d63775668ed6d415387264504e61}\n";
$_2eb5ee6ae2fec3a5387264504f7f = new B();
$_2eb5ee6ae2fec3a5387264504f7f->_f6223962daec263538726450500a();
echo "A and B count: {$_2eb5ee6ae2fec3a5387264504f7f->_f4b14694d49e3be538726450504f()}\n";
$_a8a009d37b737955387264504fc3 = new C();
echo "C Age: {$_a8a009d37b737955387264504fc3->_d63775668ed6d415387264504e61}\n";
//echo "C parent age: {$c->parent_age}\n";
C::_bcca39d7a4c54ff5387264505095();