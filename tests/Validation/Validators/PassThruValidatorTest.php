<?php

namespace Runn\tests\Validation\Validators\PassThruValidator;

use Runn\Validation\Validators\PassThruValidator;

class PassThruValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testPassThru()
    {
        $validator = new PassThruValidator();

        $result = $validator(true);
        $this->assertTrue($result);

        $result = $validator(false);
        $this->assertTrue($result);

        $result = $validator('');
        $this->assertTrue($result);

        $result = $validator('0');
        $this->assertTrue($result);

        $result = $validator('foo');
        $this->assertTrue($result);

        $result = $validator(0);
        $this->assertTrue($result);

        $result = $validator(42);
        $this->assertTrue($result);

        $result = $validator([]);
        $this->assertTrue($result);

        $result = $validator([1, 2, 3]);
        $this->assertTrue($result);

        $obj = new class {};
        $result = $validator($obj);
        $this->assertTrue($result);
    }

}