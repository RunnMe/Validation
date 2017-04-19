<?php

namespace Runn\tests\Sanitization\Sanitizers\StringSanitizer;

use Runn\Sanitization\Sanitizers\StringSanitizer;

class StringSanitizerTest extends \PHPUnit_Framework_TestCase
{

    public function testValid()
    {
        $sanitizer = new StringSanitizer();

        $result = $sanitizer(null);
        $this->assertInternalType('string', $result);
        $this->assertSame('', $result);

        $result = $sanitizer(true);
        $this->assertInternalType('string', $result);
        $this->assertSame('1', $result);

        $result = $sanitizer(false);
        $this->assertInternalType('string', $result);
        $this->assertSame('', $result);

        $result = $sanitizer('');
        $this->assertInternalType('string', $result);
        $this->assertSame('', $result);

        $result = $sanitizer('foo');
        $this->assertInternalType('string', $result);
        $this->assertSame('foo', $result);

        $result = $sanitizer(0);
        $this->assertInternalType('string', $result);
        $this->assertSame('0', $result);

        $result = $sanitizer(42);
        $this->assertInternalType('string', $result);
        $this->assertSame('42', $result);

        $result = $sanitizer(3.14159);
        $this->assertInternalType('string', $result);
        $this->assertSame('3.14159', $result);

        $result = $sanitizer(new class {public function __toString()
        {
            return 'foo';
        }
        });
        $this->assertInternalType('string', $result);
        $this->assertSame('foo', $result);
    }

}