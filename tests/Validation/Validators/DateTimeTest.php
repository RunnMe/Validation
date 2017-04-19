<?php

namespace Runn\tests\Validation\Validators\DateTime;

use Runn\Validation\Error;
use Runn\Validation\Exceptions\EmptyValue;
use Runn\Validation\Exceptions\InvalidDateTime;
use Runn\Validation\Validators\DateTime;

class DateTimeTest extends \PHPUnit_Framework_TestCase
{

    public function testPositive()
    {
        $validator = new DateTime();

        $result = $validator('2000-01-01');
        $this->assertTrue($result);

        $result = $validator('2000-01-01 10:01:01');
        $this->assertTrue($result);

        $result = $validator(new \DateTime('2000-01-01'));
        $this->assertTrue($result);

        $result = $validator(new \DateTime('2000-01-01 10:01:01'));
        $this->assertTrue($result);
    }

    public function testNegative1()
    {
        $value = '';
        try {
            $validator = new DateTime();
            $validator($value);
        } catch (Error $e) {
            $this->assertInstanceOf(EmptyValue::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

    public function testNegative2()
    {
        $value = 'test';
        try {
            $validator = new DateTime();
            $validator($value);
        } catch (Error $e) {
            $this->assertInstanceOf(InvalidDateTime::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

    public function testNegative3()
    {
        $value = '2000-13-45 34:56:78';
        try {
            $validator = new DateTime();
            $validator($value);
        } catch (Error $e) {
            $this->assertInstanceOf(InvalidDateTime::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidDateTime
     */
    public function testFalse()
    {
        $value = false;
        $validator = new DateTime();
        $validator($value);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidDateTime
     */
    public function testTrue()
    {
        $value = true;
        $validator = new DateTime();
        $validator($value);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidDateTime
     */
    public function testArray()
    {
        $value = [1, 2, 3];
        $validator = new DateTime();
        $validator($value);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidDateTime
     */
    public function testObject()
    {
        $value = new class {};
        $validator = new DateTime();
        $validator($value);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidDateTime
     */
    public function testResource()
    {
        $value = fopen('php://input', 'r');
        $validator = new DateTime();
        $validator($value);
    }

}