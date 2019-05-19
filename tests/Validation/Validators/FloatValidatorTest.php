<?php

namespace Runn\tests\Validation\Validators\FloatValidator;

use PHPUnit\Framework\TestCase;
use Runn\Validation\ValidationError;
use Runn\Validation\Exceptions\InvalidFloat;
use Runn\Validation\Validators\FloatValidator;

class FloatValidatorTest extends TestCase
{

    public function testPositive()
    {
        $validator = new FloatValidator();
        $result = $validator(0);
        $this->assertTrue($result);

        $validator = new FloatValidator();
        $result = $validator(13);
        $this->assertTrue($result);

        $validator = new FloatValidator();
        $result = $validator(3.14159);
        $this->assertTrue($result);

        $validator = new FloatValidator();
        $result = $validator('42');
        $this->assertTrue($result);

        $validator = new FloatValidator();
        $result = $validator('42.123');
        $this->assertTrue($result);
    }

    public function testNegative1()
    {
        $value = '';
        try {
            $validator = new FloatValidator();
            $validator($value);
        } catch (ValidationError $e) {
            $this->assertInstanceOf(InvalidFloat::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

    public function testNegative2()
    {
        $value = '1*2';
        try {
            $validator = new FloatValidator();
            $validator($value);
        } catch (ValidationError $e) {
            $this->assertInstanceOf(InvalidFloat::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

    public function testNull()
    {
        $validator = new FloatValidator();

        $this->expectException(InvalidFloat::class);
        $validator(null);
    }

    public function testBooleanFalse()
    {
        $validator = new FloatValidator();

        $this->expectException(InvalidFloat::class);
        $validator(false);
    }

    public function testBooleanTrue()
    {
        $validator = new FloatValidator();

        $this->expectException(InvalidFloat::class);
        $validator(true);
    }

    public function testInvalidString()
    {
        $validator = new FloatValidator();

        $this->expectException(InvalidFloat::class);
        $validator('foo');
    }

}
