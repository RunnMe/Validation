<?php

namespace Runn\tests\Validation\Validators\IntNum;

use Runn\Validation\Error;
use Runn\Validation\Exceptions\InvalidInt;
use Runn\Validation\Exceptions\OutOfRange;
use Runn\Validation\Validators\IntNum;

class IntNumTest extends \PHPUnit_Framework_TestCase
{

    public function testPositive()
    {
        $validator = new IntNum();
        $result = $validator(0);
        $this->assertTrue($result);

        $validator = new IntNum();
        $result = $validator(13);
        $this->assertTrue($result);

        $validator = new IntNum();
        $result = $validator('42');
        $this->assertTrue($result);

        $validator = new IntNum(1, 10);
        $result = $validator(7);
        $this->assertTrue($result);
    }

    public function testNegative1()
    {
        $value = '';
        try {
            $validator = new IntNum();
            $validator($value);
        } catch (Error $e) {
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
            $validator = new IntNum();
            $validator($value);
        } catch (Error $e) {
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
            $validator = new IntNum(1, 10);
            $validator($value);
        } catch (Error $e) {
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
        $validator = new IntNum();
        $result = $validator(null);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidInt
     */
    public function testBooleanFalse()
    {
        $validator = new IntNum();
        $result = $validator(false);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidInt
     */
    public function testBooleanTrue()
    {
        $validator = new IntNum();
        $result = $validator(true);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidInt
     */
    public function testInvalidString()
    {
        $validator = new IntNum();
        $result = $validator('foo');
    }

}