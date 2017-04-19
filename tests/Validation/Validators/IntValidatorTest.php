<?php

namespace Runn\tests\Validation\Validators\IntValidator;

use Runn\Validation\ValidationError;
use Runn\Validation\Exceptions\InvalidInt;
use Runn\Validation\Exceptions\OutOfRange;
use Runn\Validation\Validators\IntValidator;

class IntValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testPositive()
    {
        $validator = new IntValidator();
        $result = $validator(0);
        $this->assertTrue($result);

        $validator = new IntValidator();
        $result = $validator(13);
        $this->assertTrue($result);

        $validator = new IntValidator();
        $result = $validator('42');
        $this->assertTrue($result);

        $validator = new IntValidator(1, 10);
        $result = $validator(7);
        $this->assertTrue($result);
    }

    public function testNegative1()
    {
        $value = '';
        try {
            $validator = new IntValidator();
            $validator($value);
        } catch (ValidationError $e) {
            $this->assertInstanceOf(InvalidInt::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

    public function testNegative2()
    {
        $value = '1*2';
        try {
            $validator = new IntValidator();
            $validator($value);
        } catch (ValidationError $e) {
            $this->assertInstanceOf(InvalidInt::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

    public function testNegative3()
    {
        $value = 13;
        try {
            $validator = new IntValidator(1, 10);
            $validator($value);
        } catch (ValidationError $e) {
            $this->assertInstanceOf(OutOfRange::class, $e);
            $this->assertEquals($value, $e->value);
            return;
        }
        $this->fail();
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidInt
     */
    public function testNull()
    {
        $validator = new IntValidator();
        $result = $validator(null);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidInt
     */
    public function testBooleanFalse()
    {
        $validator = new IntValidator();
        $result = $validator(false);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidInt
     */
    public function testBooleanTrue()
    {
        $validator = new IntValidator();
        $result = $validator(true);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidInt
     */
    public function testInvalidString()
    {
        $validator = new IntValidator();
        $result = $validator('foo');
    }

}