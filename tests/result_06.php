<?php function MyStrings($offset)
{
    $strings = array(0 => 'aW5jbHVkZXMucGhw', 1 => 'Cg==', 2 => 'VGVzdCM=', 3 => 'OiA=', 4 => 'SW5jcmVtZW50IG9uY2U=', 5 => 'SW5jcmVtZW50IHR3aWNl', 6 => 'TWVzc2FnZQ==');
    return isset($strings[$offset]) ? base64_decode($strings[$offset]) : '';
}
require_once MyStrings(0);
function _7dd11dab17d25465389c3454e618($_2145c704ce76dbe5389c3454e505 = 'some text')
{
    global $_d9972a00c7a4a595389c3454e550;
    echo $_2145c704ce76dbe5389c3454e505 . MyStrings(1);
    $_d9972a00c7a4a595389c3454e550++;
}
class TheTest
{
    public function _7dd11dab17d25465389c3454e65c($_2145c704ce76dbe5389c3454e505 = 'some text2')
    {
        otherFun($_2145c704ce76dbe5389c3454e505);
    }
    public static function _559a9f5ac00a3ae5389c3454e6a1($_2145c704ce76dbe5389c3454e505 = 'some text3')
    {
        global $_d9972a00c7a4a595389c3454e550;
        global $_c1736650dd382af5389c3454e594;
        $_c1736650dd382af5389c3454e594->field1 = MyStrings(2) . $_d9972a00c7a4a595389c3454e550 . MyStrings(3) . $_2145c704ce76dbe5389c3454e505;
        _7dd11dab17d25465389c3454e618($_c1736650dd382af5389c3454e594->field1);
    }
}
_7dd11dab17d25465389c3454e618(MyStrings(4));
_7dd11dab17d25465389c3454e618(MyStrings(5));
_7dd11dab17d25465389c3454e618($_c1736650dd382af5389c3454e594->field1);
$_fdc093412ce55f05389c3454e5d6 = new TheTest();
$_fdc093412ce55f05389c3454e5d6->_7dd11dab17d25465389c3454e65c();
TheTest::_559a9f5ac00a3ae5389c3454e6a1(MyStrings(6));