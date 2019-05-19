<?php

namespace Runn\tests\Validation\Validators\UuidValidator;

use PHPUnit\Framework\TestCase;
use Runn\Validation\Exceptions\EmptyValue;
use Runn\Validation\Exceptions\InvalidUuid;
use Runn\Validation\Validators\UuidValidator;

class UuidValidatorTest extends TestCase
{

    public function testUuidEmpty()
    {
        $validator = new UuidValidator();

        $this->expectException(EmptyValue::class);
        $validator('');
    }

    public function testNotString()
    {
        $validator = new UuidValidator();

        $this->expectException(InvalidUuid::class);
        $validator(42);
    }

    public function testInvalidUuid()
    {
        $validator = new UuidValidator();

        $this->expectException(InvalidUuid::class);
        $validator('foo');
    }

    public function testPositive()
    {
        $validator = new UuidValidator();

        $result = $validator('e3b9876f-86e4-4895-8648-1b6ee8091786');
        $this->assertTrue($result);

        $result = $validator('{e3b9876f-86e4-4895-8648-1b6ee8091786}');
        $this->assertTrue($result);

        $result = $validator('{E3B9876F-86E4-4895-8648-1B6EE8091786}');
        $this->assertTrue($result);

        $result = $validator('{%#Z- e3b9876f-86e4-4895-8648-1b6ee8091786');
        $this->assertTrue($result);
    }
}
