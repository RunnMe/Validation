<?php

namespace Runn\tests\Sanitization\Sanitizers\StringSanitizer;

use PHPUnit\Framework\TestCase;
use Runn\Sanitization\Sanitizers\StringSanitizer;

class StringSanitizerTest extends TestCase
{

    public function testValid()
    {
        $sanitizer = new StringSanitizer();

        $result = $sanitizer(null);
        $this->assertIsString($result);
        $this->assertSame('', $result);

        $result = $sanitizer(true);
        $this->assertIsString($result);
        $this->assertSame('1', $result);

        $result = $sanitizer(false);
        $this->assertIsString($result);
        $this->assertSame('', $result);

        $result = $sanitizer('');
        $this->assertIsString($result);
        $this->assertSame('', $result);

        $result = $sanitizer('foo');
        $this->assertIsString($result);
        $this->assertSame('foo', $result);

        $result = $sanitizer(0);
        $this->assertIsString($result);
        $this->assertSame('0', $result);

        $result = $sanitizer(42);
        $this->assertIsString($result);
        $this->assertSame('42', $result);

        $result = $sanitizer(3.14159);
        $this->assertIsString($result);
        $this->assertSame('3.14159', $result);

        $result = $sanitizer(new class {public function __toString()
        {
            return 'foo';
        }
        });
        $this->assertIsString($result);
        $this->assertSame('foo', $result);
    }

}
