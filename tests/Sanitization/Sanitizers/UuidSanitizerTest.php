<?php

namespace Runn\tests\Sanitization\Sanitizers\UuidSanitizer;

use Runn\Sanitization\Sanitizers\UuidSanitizer;

class UuidSanitizerTest extends \PHPUnit_Framework_TestCase
{

    public function testValid()
    {
        $sanitizer = new UuidSanitizer();

        $result = $sanitizer('(e3b9876f%86e4#4895-8648-1b6ee8091786XYz)');
        $this->assertSame('{E3B9876F-86E4-4895-8648-1B6EE8091786}', $result);
    }
}
