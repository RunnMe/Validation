<?php

namespace Runn\tests\Sanitization\Sanitizers\IntNum;

use Runn\Sanitization\Sanitizers\IntNum;

class IntNumTest extends \PHPUnit_Framework_TestCase
{

    public function testValid()
    {
        $sanitizer = new IntNum();
        $result = $sanitizer('0');

        $this->assertInternalType('integer', $result);
        $this->assertEquals(0, $result);

        $sanitizer = new IntNum();
        $result = $sanitizer('42');

        $this->assertInternalType('integer', $result);
        $this->assertEquals(42, $result);

        $sanitizer = new IntNum();
        $result = $sanitizer('-42');

        $this->assertInternalType('integer', $result);
        $this->assertEquals(-42, $result);
    }

    public function testTrim()
    {
        $sanitizer = new IntNum();
        $result = $sanitizer('  ');

        $this->assertInternalType('integer', $result);
        $this->assertEquals(0, $result);

        $sanitizer = new IntNum();
        $result = $sanitizer('42!!!');

        $this->assertInternalType('integer', $result);
        $this->assertEquals(42, $result);
    }

}