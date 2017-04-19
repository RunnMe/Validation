<?php

namespace Runn\tests\Validation\Validators\UrlValidator;

use Runn\Validation\ValidationError;
use Runn\Validation\Exceptions\EmptyValue;
use Runn\Validation\Exceptions\InvalidUrl;
use Runn\Validation\Validators\UrlValidator;

class UrlValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testPositive()
    {
        $validator = new UrlValidator();
        $result = $validator('http://test.org');
        $this->assertTrue($result);
    }

    public function testNegative1()
    {
        $value = '';
        try {
            $validator = new UrlValidator();
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
            $validator = new UrlValidator();
            $validator($value);
        } catch (ValidationError $e) {
            $this->assertInstanceOf(InvalidUrl::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

    public function testNegative3()
    {
        $value = '  http://test.org';
        try {
            $validator = new UrlValidator();
            $validator($value);
        } catch (ValidationError $e) {
            $this->assertInstanceOf(InvalidUrl::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

}