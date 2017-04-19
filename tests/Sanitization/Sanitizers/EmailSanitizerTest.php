<?php

namespace Runn\tests\Sanitization\Sanitizers\EmailSanitizer;

use Runn\Sanitization\Sanitizers\EmailSanitizer;

class EmailSanitizerTest extends \PHPUnit_Framework_TestCase
{

    public function testValid()
    {
        $sanitizer = new EmailSanitizer();
        $result = $sanitizer('john@valid.org');

        $this->assertInternalType('string', $result);
        $this->assertEquals('john@valid.org', $result);
    }

    public function testTrim()
    {
        $sanitizer = new EmailSanitizer();
        $result = $sanitizer('"john@valid.org"   ');

        $this->assertInternalType('string', $result);
        $this->assertEquals('john@valid.org', $result);
    }

}