<?php

namespace Runn\tests\Validation\Validators\BooleanValidator;

use Runn\Validation\Validators\BooleanValidator;

class BooleanValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testPositive()
    {
        $validator = new BooleanValidator();

        $result = $validator(null);
        $this->assertTrue($result);

        $result = $validator(false);
        $this->assertTrue($result);
        $result = $validator(true);
        $this->assertTrue($result);

        $result = $validator('');
        $this->assertTrue($result);
        $result = $validator('false');
        $this->assertTrue($result);
        $result = $validator('true');
        $this->assertTrue($result);
        $result = $validator('off');
        $this->assertTrue($result);
        $result = $validator('on');
        $this->assertTrue($result);
        $result = $validator('no');
        $this->assertTrue($result);
        $result = $validator('yes');
        $this->assertTrue($result);
        $result = $validator('blablabla');
        $this->assertTrue($result);
        $result = $validator('0');
        $this->assertTrue($result);
        $result = $validator('1');
        $this->assertTrue($result);
        $result = $validator('42');
        $this->assertTrue($result);
        $result = $validator('3.14159');
        $this->assertTrue($result);

        $result = $validator(0);
        $this->assertTrue($result);
        $result = $validator(1);
        $this->assertTrue($result);
        $result = $validator(42);
        $this->assertTrue($result);
        $result = $validator(3.14159);
        $this->assertTrue($result);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidBoolean
     */
    public function testArrayEmpty()
    {
        $validator = new BooleanValidator();
        $result = $validator([]);
        $this->fail();
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidBoolean
     */
    public function testArrayNotEmpty()
    {
        $validator = new BooleanValidator();
        $result = $validator([1, 2, 3]);
        $this->fail();
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidBoolean
     */
    public function testObject()
    {
        $validator = new BooleanValidator();
        $result = $validator(new class {});
        $this->fail();
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidBoolean
     */
    public function testResource()
    {
        $validator = new BooleanValidator();
        $result = $validator(fopen('php://input', 'r'));
        $this->fail();
    }

}