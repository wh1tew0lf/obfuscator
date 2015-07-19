<?php /**
 * Test for class names and methods replacement
 */
class A
{
    public $_1 = 60;
    public static $_2 = 0;
    private static $_3 = 6;
    public function __construct()
    {
        echo 'A created
';
        self::$_2++;
    }
    public function _4()
    {
        echo 'It is method1 from class A(' . self::$_3 . ')
';
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
        echo 'It is method1 from class B
';
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
        echo self::$_2 . '
';
    }
    public function __get($_9)
    {
        if ($_9 == 'parent_age') {
            return 'Don\'t know!';
        }
        return null;
    }
}
$_10 = new A();
$_11 = new B();
$_12 = new C();
echo 'A count: ' . A::$_2 . '
';
$_10->_4();
$_10->_1 = 167;
echo 'A Age: ' . $_10->_1 . '
';
$_11->_4();
echo 'A and B count: ' . $_11->_6() . '
';
echo 'C Age: ' . $_12->_1 . '
';
echo 'C parent age: ' . $_12->parent_age . '
';
echo 'B method from C: ' . $_12->_4() . '
';
echo 'B get parent age: ' . $_11->_1 . '
';
echo 'B count: ' . B::$_2 . '
';
echo 'C method2: ' . $_12->_6() . '
';
C::_8();