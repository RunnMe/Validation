<?php

namespace Runn\tests\Sanitization\Sanitizers\FloatSanitizer;

use PHPUnit\Framework\TestCase;
use Runn\Sanitization\Sanitizers\FloatSanitizer;

class FloatSanitizerTest extends TestCase
{

    public function testValid()
    {
        $sanitizer = new FloatSanitizer();
        $result = $sanitizer('0');

        // @todo: WTF???
        $this->assertIsFloat($result);
        $this->assertEquals(0, $result);

        $sanitizer = new FloatSanitizer();
        $result = $sanitizer('42');

        $this->assertIsFloat($result);
        $this->assertEquals(42, $result);

        $sanitizer = new FloatSanitizer();
        $result = $sanitizer('-42');

        $this->assertIsFloat($result);
        $this->assertEquals(-42, $result);

        $sanitizer = new FloatSanitizer();
        $result = $sanitizer('3.14159');

        $this->assertIsFloat($result);
        $this->assertEquals(3.14159, $result);

        $sanitizer = new FloatSanitizer();
        $result = $sanitizer(3.14159);

        $this->assertIsFloat($result);
        $this->assertEquals(3.14159, $result);
    }

    public function testTrim()
    {
        $sanitizer = new FloatSanitizer();
        $result = $sanitizer('  ');

        // @todo: WTF???
        $this->assertIsFloat($result);
        $this->assertEquals(0, $result);

        $sanitizer = new FloatSanitizer();
        $result = $sanitizer('42.123!!!');

        $this->assertIsFloat($result);
        $this->assertEquals(42.123, $result);
    }

}
