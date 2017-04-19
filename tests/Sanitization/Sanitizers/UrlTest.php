<?php

namespace Runn\tests\Sanitization\Sanitizers\Url;

use Runn\Sanitization\Sanitizers\Url;

class UrlTest extends \PHPUnit_Framework_TestCase
{

    public function testValid()
    {
        $sanitizer = new Url();
        $result = $sanitizer('http://test.com/foo/bar/?id=42');

        $this->assertInternalType('string', $result);
        $this->assertEquals('http://test.com/foo/bar/?id=42', $result);
    }

    public function testTrim()
    {
        $sanitizer = new Url();
        $result = $sanitizer('  http://test.com/foo/bar/?id=42  ');

        $this->assertInternalType('string', $result);
        $this->assertEquals('http://test.com/foo/bar/?id=42', $result);
    }

}