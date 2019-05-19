<?php

namespace Runn\tests\Validation\Validators\DateTimeValidator;

use PHPUnit\Framework\TestCase;
use Runn\Validation\ValidationError;
use Runn\Validation\Exceptions\EmptyValue;
use Runn\Validation\Exceptions\InvalidDateTime;
use Runn\Validation\Validators\DateTimeValidator;

class DateTimeValidatorTest extends TestCase
{

    public function testPositive()
    {
        $validator = new DateTimeValidator();

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
            $validator = new DateTimeValidator();
            $validator($value);
        } catch (ValidationError $e) {
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
            $validator = new DateTimeValidator();
            $validator($value);
        } catch (ValidationError $e) {
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
            $validator = new DateTimeValidator();
            $validator($value);
        } catch (ValidationError $e) {
            $this->assertInstanceOf(InvalidDateTime::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

    public function testFalse()
    {
        $value = false;
        $validator = new DateTimeValidator();

        $this->expectException(InvalidDateTime::class);
        $validator($value);
    }

    public function testTrue()
    {
        $value = true;
        $validator = new DateTimeValidator();

        $this->expectException(InvalidDateTime::class);
        $validator($value);
    }

    public function testArray()
    {
        $value = [1, 2, 3];
        $validator = new DateTimeValidator();

        $this->expectException(InvalidDateTime::class);
        $validator($value);
    }

    public function testObject()
    {
        $value = new class {};
        $validator = new DateTimeValidator();

        $this->expectException(InvalidDateTime::class);
        $validator($value);
    }

    public function testResource()
    {
        $value = fopen('php://input', 'r');
        $validator = new DateTimeValidator();

        $this->expectException(InvalidDateTime::class);
        $validator($value);
    }

}
