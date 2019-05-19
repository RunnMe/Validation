<?php

namespace Runn\tests\Sanitization\Sanitizers\IntSanitizer;

use PHPUnit\Framework\TestCase;
use Runn\Sanitization\Sanitizers\IntSanitizer;

class IntSanitizerTest extends TestCase
{

    public function testValid()
    {
        $sanitizer = new IntSanitizer();
        $result = $sanitizer('0');

        $this->assertIsInt($result);
        $this->assertEquals(0, $result);

        $sanitizer = new IntSanitizer();
        $result = $sanitizer('42');

        $this->assertIsInt($result);
        $this->assertEquals(42, $result);

        $sanitizer = new IntSanitizer();
        $result = $sanitizer('-42');

        $this->assertIsInt($result);
        $this->assertEquals(-42, $result);
    }

    public function testTrim()
    {
        $sanitizer = new IntSanitizer();
        $result = $sanitizer('  ');

        $this->assertIsInt($result);
        $this->assertEquals(0, $result);

        $sanitizer = new IntSanitizer();
        $result = $sanitizer('42!!!');

        $this->assertIsInt($result);
        $this->assertEquals(42, $result);
    }

}
