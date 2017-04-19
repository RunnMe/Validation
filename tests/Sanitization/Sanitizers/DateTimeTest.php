<?php

namespace Runn\tests\Sanitization\Sanitizers\DateTime;

use Runn\Sanitization\Sanitizers\DateTime;

class DateTimeTest extends \PHPUnit_Framework_TestCase
{

    public function testStrToTime()
    {
        $sanitizer = new DateTime();
        $result = $sanitizer('2000-01-01');

        $this->assertInstanceOf(\DateTimeInterface::class, $result);
        $this->assertInstanceOf(\DateTime::class, $result);
        $this->assertEquals(new \DateTime('2000-01-01'), $result);
    }

    public function testDateTimeObject()
    {
        $sanitizer = new DateTime();
        $result = $sanitizer(new \DateTime('2000-01-01'));

        $this->assertInstanceOf(\DateTimeInterface::class, $result);
        $this->assertInstanceOf(\DateTime::class, $result);
        $this->assertEquals(new \DateTime('2000-01-01'), $result);
    }

}