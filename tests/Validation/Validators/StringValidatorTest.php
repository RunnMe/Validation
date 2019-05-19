<?php

namespace Runn\tests\Validation\Validators\StringValidator;

use PHPUnit\Framework\TestCase;
use Runn\Validation\Exceptions\InvalidString;
use Runn\Validation\Validators\StringValidator;

class StringValidatorTest extends TestCase
{

    public function testPositive()
    {
        $validator = new StringValidator();

        $result = $validator(null);
        $this->assertTrue($result);

        $result = $validator(true);
        $this->assertTrue($result);

        $result = $validator(false);
        $this->assertTrue($result);

        $result = $validator('');
        $this->assertTrue($result);

        $result = $validator('foo');
        $this->assertTrue($result);

        $result = $validator(0);
        $this->assertTrue($result);

        $result = $validator(42);
        $this->assertTrue($result);

        $result = $validator(3.14159);
        $this->assertTrue($result);


        $result = $validator(new class {public function __toString()
            {
                return 'foo';
            }
        });
        $this->assertTrue($result);
    }

    public function testNegativeArray()
    {
        $validator = new StringValidator();

        $this->expectException(InvalidString::class);
        $validator([1, 2, 3]);
    }

    public function testNegativeObject()
    {
        $validator = new StringValidator();

        $this->expectException(InvalidString::class);
        $validator(new class {});
    }

    public function testNegativeResource()
    {
        $validator = new StringValidator();

        $this->expectException(InvalidString::class);
        $validator(fopen('php://input', 'r'));
    }

}
