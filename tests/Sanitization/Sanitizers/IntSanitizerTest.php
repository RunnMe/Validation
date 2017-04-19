<?php

namespace Runn\tests\Sanitization\Sanitizers\IntSanitizer;

use Runn\Sanitization\Sanitizers\IntSanitizer;

class IntSanitizerTest extends \PHPUnit_Framework_TestCase
{

    public function testValid()
    {
        $sanitizer = new IntSanitizer();
        $result = $sanitizer('0');

        $this->assertInternalType('integer', $result);
        $this->assertEquals(0, $result);

        $sanitizer = new IntSanitizer();
        $result = $sanitizer('42');

        $this->assertInternalType('integer', $result);
        $this->assertEquals(42, $result);

        $sanitizer = new IntSanitizer();
        $result = $sanitizer('-42');

        $this->assertInternalType('integer', $result);
        $this->assertEquals(-42, $result);
    }

    public function testTrim()
    {
        $sanitizer = new IntSanitizer();
        $result = $sanitizer('  ');

        $this->assertInternalType('integer', $result);
        $this->assertEquals(0, $result);

        $sanitizer = new IntSanitizer();
        $result = $sanitizer('42!!!');

        $this->assertInternalType('integer', $result);
        $this->assertEquals(42, $result);
    }

}