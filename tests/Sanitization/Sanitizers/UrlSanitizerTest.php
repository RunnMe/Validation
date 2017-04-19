<?php

namespace Runn\tests\Sanitization\Sanitizers\UrlSanitizer;

use Runn\Sanitization\Sanitizers\UrlSanitizer;

class UrlSanitizerTest extends \PHPUnit_Framework_TestCase
{

    public function testValid()
    {
        $sanitizer = new UrlSanitizer();
        $result = $sanitizer('http://test.com/foo/bar/?id=42');

        $this->assertInternalType('string', $result);
        $this->assertEquals('http://test.com/foo/bar/?id=42', $result);
    }

    public function testTrim()
    {
        $sanitizer = new UrlSanitizer();
        $result = $sanitizer('  http://test.com/foo/bar/?id=42  ');

        $this->assertInternalType('string', $result);
        $this->assertEquals('http://test.com/foo/bar/?id=42', $result);
    }

}