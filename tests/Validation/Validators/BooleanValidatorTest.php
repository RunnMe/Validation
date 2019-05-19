<?php

namespace Runn\tests\Validation\Validators\BooleanValidator;

use PHPUnit\Framework\TestCase;
use Runn\Validation\Exceptions\InvalidBoolean;
use Runn\Validation\Validators\BooleanValidator;

class BooleanValidatorTest extends TestCase
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

    public function testArrayEmpty()
    {
        $validator = new BooleanValidator();

        $this->expectException(InvalidBoolean::class);
        $result = $validator([]);
    }

    public function testArrayNotEmpty()
    {
        $validator = new BooleanValidator();

        $this->expectException(InvalidBoolean::class);
        $result = $validator([1, 2, 3]);
    }

    public function testObject()
    {
        $validator = new BooleanValidator();

        $this->expectException(InvalidBoolean::class);
        $result = $validator(new class {});
    }

    public function testResource()
    {
        $validator = new BooleanValidator();

        $this->expectException(InvalidBoolean::class);
        $result = $validator(fopen('php://input', 'r'));
    }

}
