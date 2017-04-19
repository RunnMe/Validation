<?php

namespace Runn\tests\Sanitization\Sanitizers\Email;

use Runn\Sanitization\Sanitizers\Email;

class EmailTest extends \PHPUnit_Framework_TestCase
{

    public function testValid()
    {
        $sanitizer = new Email();
        $result = $sanitizer('john@valid.org');

        $this->assertInternalType('string', $result);
        $this->assertEquals('john@valid.org', $result);
    }

    public function testTrim()
    {
        $sanitizer = new Email();
        $result = $sanitizer('"john@valid.org"   ');

        $this->assertInternalType('string', $result);
        $this->assertEquals('john@valid.org', $result);
    }

}