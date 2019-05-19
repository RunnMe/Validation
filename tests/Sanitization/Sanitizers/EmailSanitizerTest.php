<?php

namespace Runn\tests\Sanitization\Sanitizers\EmailSanitizer;

use PHPUnit\Framework\TestCase;
use Runn\Sanitization\Sanitizers\EmailSanitizer;

class EmailSanitizerTest extends TestCase
{

    public function testValid()
    {
        $sanitizer = new EmailSanitizer();
        $result = $sanitizer('john@valid.org');

        $this->assertIsString($result);
        $this->assertEquals('john@valid.org', $result);
    }

    public function testTrim()
    {
        $sanitizer = new EmailSanitizer();
        $result = $sanitizer('"john@valid.org"   ');

        $this->assertIsString($result);
        $this->assertEquals('john@valid.org', $result);
    }

}
