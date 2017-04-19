<?php

namespace Runn\tests\Validation\Validators\IpV4Validator;

use Runn\Validation\ValidationError;
use Runn\Validation\Exceptions\EmptyValue;
use Runn\Validation\Exceptions\InvalidIpV4;
use Runn\Validation\Validators\IpV4Validator;

class IpV4ValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testPositive()
    {
        $validator = new IpV4Validator();
        $result = $validator('8.8.8.8');
        $this->assertTrue($result);
    }

    public function testNegative1()
    {
        $value = '';
        try {
            $validator = new IpV4Validator();
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
        $value = '8.8.8';
        try {
            $validator = new IpV4Validator();
            $validator($value);
        } catch (ValidationError $e) {
            $this->assertInstanceOf(InvalidIpV4::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

    public function testNegative3()
    {
        $value = '300.200.100.50';
        try {
            $validator = new IpV4Validator();
            $validator($value);
        } catch (ValidationError $e) {
            $this->assertInstanceOf(InvalidIpV4::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

}