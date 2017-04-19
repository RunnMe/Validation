<?php

namespace Runn\tests\Sanitization\Sanitizers\PassThruSanitizer;

use Runn\Sanitization\Sanitizers\PassThruSanitizer;

class PassThruSanitizerTest extends \PHPUnit_Framework_TestCase
{

    public function testPassThru()
    {
        $sanitizer = new PassThruSanitizer();

        $result = $sanitizer(true);
        $this->assertSame(true, $result);

        $result = $sanitizer(false);
        $this->assertSame(false, $result);

        $result = $sanitizer('');
        $this->assertSame('', $result);

        $result = $sanitizer('0');
        $this->assertSame('0', $result);

        $result = $sanitizer('foo');
        $this->assertSame('foo', $result);

        $result = $sanitizer(0);
        $this->assertSame(0, $result);

        $result = $sanitizer(42);
        $this->assertSame(42, $result);

        $result = $sanitizer([]);
        $this->assertSame([], $result);

        $result = $sanitizer([1, 2, 3]);
        $this->assertSame([1, 2, 3], $result);

        $obj = new class {};
        $result = $sanitizer($obj);
        $this->assertEquals($obj, $result);
    }

}