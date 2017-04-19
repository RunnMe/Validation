<?php

namespace Runn\tests\Validation\Validators\FloatNum;

use Runn\Validation\Error;
use Runn\Validation\Exceptions\InvalidFloat;
use Runn\Validation\Validators\FloatNum;

class FloatNumTest extends \PHPUnit_Framework_TestCase
{

    public function testPositive()
    {
        $validator = new FloatNum();
        $result = $validator(0);
        $this->assertTrue($result);

        $validator = new FloatNum();
        $result = $validator(13);
        $this->assertTrue($result);

        $validator = new FloatNum();
        $result = $validator(3.14159);
        $this->assertTrue($result);

        $validator = new FloatNum();
        $result = $validator('42');
        $this->assertTrue($result);

        $validator = new FloatNum();
        $result = $validator('42.123');
        $this->assertTrue($result);
    }

    public function testNegative1()
    {
        $value = '';
        try {
            $validator = new FloatNum();
            $validator($value);
        } catch (Error $e) {
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
            $validator = new FloatNum();
            $validator($value);
        } catch (Error $e) {
            $this->assertInstanceOf(InvalidFloat::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidFloat
     */
    public function testNull()
    {
        $validator = new FloatNum();
        $result = $validator(null);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidFloat
     */
    public function testBooleanFalse()
    {
        $validator = new FloatNum();
        $result = $validator(false);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidFloat
     */
    public function testBooleanTrue()
    {
        $validator = new FloatNum();
        $result = $validator(true);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidFloat
     */
    public function testInvalidString()
    {
        $validator = new FloatNum();
        $result = $validator('foo');
    }

}