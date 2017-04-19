<?php

namespace Runn\tests\Sanitization\Sanitizers\DateTimeSanitizer;

use Runn\Sanitization\Sanitizers\DateTimeSanitizer;

class DateTimeSanitizerTest extends \PHPUnit_Framework_TestCase
{

    public function testStrToTime()
    {
        $sanitizer = new DateTimeSanitizer();
        $result = $sanitizer('2000-01-01');

        $this->assertInstanceOf(\DateTimeInterface::class, $result);
        $this->assertInstanceOf(\DateTime::class, $result);
        $this->assertEquals(new \DateTime('2000-01-01'), $result);
    }

    public function testDateTimeObject()
    {
        $sanitizer = new DateTimeSanitizer();
        $result = $sanitizer(new \DateTime('2000-01-01'));

        $this->assertInstanceOf(\DateTimeInterface::class, $result);
        $this->assertInstanceOf(\DateTime::class, $result);
        $this->assertEquals(new \DateTime('2000-01-01'), $result);
    }

}