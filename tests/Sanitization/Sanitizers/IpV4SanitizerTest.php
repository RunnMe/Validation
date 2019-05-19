<?php

namespace Runn\tests\Sanitization\Sanitizers\IpV4Sanitizer;

use PHPUnit\Framework\TestCase;
use Runn\Sanitization\Sanitizers\IpV4Sanitizer;

class IpV4SanitizerTest extends TestCase
{

    public function testValid()
    {
        $sanitizer = new IpV4Sanitizer();
        $result = $sanitizer('1.2.3.4');

        $this->assertIsString($result);
        $this->assertEquals('1.2.3.4', $result);
    }

    public function testInvalid()
    {
        $sanitizer = new IpV4Sanitizer();
        $result = $sanitizer('1.2.3.400');

        $this->assertIsString($result);
        $this->assertEquals('0.0.0.0', $result);

        $sanitizer = new IpV4Sanitizer();
        $result = $sanitizer('1.2.3.4.5');

        $this->assertIsString($result);
        $this->assertEquals('0.0.0.0', $result);
    }

    public function testTrim()
    {
        $sanitizer = new IpV4Sanitizer();
        $result = $sanitizer(' 1.2.3.4  !!!');

        $this->assertIsString($result);
        $this->assertEquals('1.2.3.4', $result);
    }

}
