<?php
namespace phpUnitTutorial\Test;

class StupidTest extends \PHPUnit_Framework_TestCase {

    public function testTrueIsTrue() {
        $foo = true;
        $this->assertTrue($foo);
    }

}