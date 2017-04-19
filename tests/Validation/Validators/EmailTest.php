<?php

namespace Runn\tests\Validation\Validators\Email;

use Runn\Validation\Error;
use Runn\Validation\Exceptions\EmptyValue;
use Runn\Validation\Exceptions\InvalidEmail;
use Runn\Validation\Validators\Email;

class EmailTest extends \PHPUnit_Framework_TestCase
{

    public function testPositive()
    {
        $validator = new Email();
        $result = $validator('test@test.com');
        $this->assertTrue($result);
    }

    public function testNegative1()
    {
        $value = '';
        try {
            $validator = new Email();
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
            $validator = new Email();
            $validator($value);
        } catch (Error $e) {
            $this->assertInstanceOf(InvalidEmail::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

    public function testNegative3()
    {
        $value = 'test@test.com   ';
        try {
            $validator = new Email();
            $validator($value);
        } catch (Error $e) {
            $this->assertInstanceOf(InvalidEmail::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

}