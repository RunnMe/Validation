<?php

namespace Runn\tests\Validation\Validators\Url;

use Runn\Validation\ValidationError;
use Runn\Validation\Exceptions\EmptyValue;
use Runn\Validation\Exceptions\InvalidUrl;
use Runn\Validation\Validators\Url;

class UrlTest extends \PHPUnit_Framework_TestCase
{

    public function testPositive()
    {
        $validator = new Url();
        $result = $validator('http://test.org');
        $this->assertTrue($result);
    }

    public function testNegative1()
    {
        $value = '';
        try {
            $validator = new Url();
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
            $validator = new Url();
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
            $validator = new Url();
            $validator($value);
        } catch (ValidationError $e) {
            $this->assertInstanceOf(InvalidUrl::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

}