<?php

namespace Runn\tests\Sanitization\Sanitizers\FloatNum;

use Runn\Sanitization\Sanitizers\FloatNum;

class FloatNumTest extends \PHPUnit_Framework_TestCase
{

    public function testValid()
    {
        $sanitizer = new FloatNum();
        $result = $sanitizer('0');

        // @todo: WTF???
        $this->assertInternalType('float', $result);
        $this->assertEquals(0, $result);

        $sanitizer = new FloatNum();
        $result = $sanitizer('42');

        $this->assertInternalType('float', $result);
        $this->assertEquals(42, $result);

        $sanitizer = new FloatNum();
        $result = $sanitizer('-42');

        $this->assertInternalType('float', $result);
        $this->assertEquals(-42, $result);

        $sanitizer = new FloatNum();
        $result = $sanitizer('3.14159');

        $this->assertInternalType('float', $result);
        $this->assertEquals(3.14159, $result);

        $sanitizer = new FloatNum();
        $result = $sanitizer(3.14159);

        $this->assertInternalType('float', $result);
        $this->assertEquals(3.14159, $result);
    }

    public function testTrim()
    {
        $sanitizer = new FloatNum();
        $result = $sanitizer('  ');

        // @todo: WTF???
        $this->assertInternalType('float', $result);
        $this->assertEquals(0, $result);

        $sanitizer = new FloatNum();
        $result = $sanitizer('42.123!!!');

        $this->assertInternalType('float', $result);
        $this->assertEquals(42.123, $result);
    }

}