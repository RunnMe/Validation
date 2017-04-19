<?php

namespace Runn\tests\Sanitization\Sanitizers\Date;

use Runn\Sanitization\Sanitizers\Date;

class DateTest extends \PHPUnit_Framework_TestCase
{

    public function testStrToTime()
    {
        $sanitizer = new Date();

        $result = $sanitizer('2000-01-01');

        $this->assertInstanceOf(\DateTimeInterface::class, $result);
        $this->assertInstanceOf(\DateTime::class, $result);
        $this->assertEquals(new \DateTime('2000-01-01'), $result);

        $result = $sanitizer('2000-01-01 10:01:01');

        $this->assertInstanceOf(\DateTimeInterface::class, $result);
        $this->assertInstanceOf(\DateTime::class, $result);
        $this->assertEquals(new \DateTime('2000-01-01'), $result);
    }

    public function testDateTimeObject()
    {
        $sanitizer = new Date();

        $result = $sanitizer(new \DateTime('2000-01-01'));

        $this->assertInstanceOf(\DateTimeInterface::class, $result);
        $this->assertInstanceOf(\DateTime::class, $result);
        $this->assertEquals(new \DateTime('2000-01-01'), $result);

        $result = $sanitizer(new \DateTime('2000-01-01 10:01:01'));

        $this->assertInstanceOf(\DateTimeInterface::class, $result);
        $this->assertInstanceOf(\DateTime::class, $result);
        $this->assertEquals(new \DateTime('2000-01-01'), $result);
    }

}