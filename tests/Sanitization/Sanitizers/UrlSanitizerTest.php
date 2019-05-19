<?php

namespace Runn\tests\Sanitization\Sanitizers\UrlSanitizer;

use PHPUnit\Framework\TestCase;
use Runn\Sanitization\Sanitizers\UrlSanitizer;

class UrlSanitizerTest extends TestCase
{

    public function testValid()
    {
        $sanitizer = new UrlSanitizer();
        $result = $sanitizer('http://test.com/foo/bar/?id=42');

        $this->assertIsString($result);
        $this->assertEquals('http://test.com/foo/bar/?id=42', $result);
    }

    public function testTrim()
    {
        $sanitizer = new UrlSanitizer();
        $result = $sanitizer('  http://test.com/foo/bar/?id=42  ');

        $this->assertIsString($result);
        $this->assertEquals('http://test.com/foo/bar/?id=42', $result);
    }

}
