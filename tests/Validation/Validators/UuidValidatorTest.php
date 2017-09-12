<?php

namespace Runn\tests\Validation\Validators\UuidValidator;

use Runn\Validation\Validators\UuidValidator;

class UuidValidatorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \Runn\Validation\Exceptions\EmptyValue
     */
    public function testUuidEmpty()
    {
        $validator = new UuidValidator();
        $validator('');
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidUuid
     */
    public function testNotString()
    {
        $validator = new UuidValidator();
        $validator(42);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidUuid
     */
    public function testInvalidUuid()
    {
        $validator = new UuidValidator();
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
