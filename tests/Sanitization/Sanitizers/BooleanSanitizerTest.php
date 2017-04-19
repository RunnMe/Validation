<?php

namespace Runn\tests\Sanitization\Sanitizers\BooleanSanitizer;

use Runn\Sanitization\Sanitizers\BooleanSanitizer;

class BooleanSanitizerTest extends \PHPUnit_Framework_TestCase
{

    public function testFalse()
    {
        $sanitizer = new BooleanSanitizer();

        $result = $sanitizer(null);
        $this->assertFalse($result);

        $result = $sanitizer(false);
        $this->assertFalse($result);

        $result = $sanitizer('');
        $this->assertFalse($result);
        $result = $sanitizer('false');
        $this->assertFalse($result);
        $result = $sanitizer('off');
        $this->assertFalse($result);
        $result = $sanitizer('no');
        $this->assertFalse($result);
        $result = $sanitizer('0');
        $this->assertFalse($result);

        $result = $sanitizer(0);
        $this->assertFalse($result);
    }

    public function testTrue()
    {
        $sanitizer = new BooleanSanitizer();

        $result = $sanitizer(true);
        $this->assertTrue($result);

        $result = $sanitizer('true');
        $this->assertTrue($result);
        $result = $sanitizer('on');
        $this->assertTrue($result);
        $result = $sanitizer('yes');
        $this->assertTrue($result);
        $result = $sanitizer('blablabla');
        $this->assertTrue($result);
        $result = $sanitizer('1');
        $this->assertTrue($result);
        $result = $sanitizer('42');
        $this->assertTrue($result);
        $result = $sanitizer('3.14159');
        $this->assertTrue($result);

        $result = $sanitizer(1);
        $this->assertTrue($result);
        $result = $sanitizer(42);
        $this->assertTrue($result);
        $result = $sanitizer(3.14159);
        $this->assertTrue($result);
    }

}