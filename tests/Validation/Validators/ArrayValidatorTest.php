<?php

namespace Runn\tests\Validation\Validators\ArrayValidator;

use Runn\Core\Collection;
use Runn\Validation\Exceptions\InvalidArray;
use Runn\Validation\Validators\ArrayValidator;

class ArrayValidatorTest extends \PHPUnit_Framework_TestCase
{

    public function testNegative()
    {
        $validator = new ArrayValidator();

        $this->expectException(InvalidArray::class);
        $result = $validator(null);

        $this->expectException(InvalidArray::class);
        $result = $validator(false);
        $this->expectException(InvalidArray::class);
        $result = $validator(true);

        $this->expectException(InvalidArray::class);
        $result = $validator('');
        $this->expectException(InvalidArray::class);
        $result = $validator('false');
        $this->expectException(InvalidArray::class);
        $result = $validator('true');

        $this->expectException(InvalidArray::class);
        $result = $validator('blablabla');

        $this->expectException(InvalidArray::class);
        $result = $validator('0');
        $this->expectException(InvalidArray::class);
        $result = $validator('1');
        $this->expectException(InvalidArray::class);
        $result = $validator('42');

        $this->expectException(InvalidArray::class);
        $result = $validator('3.14159');

        $this->expectException(InvalidArray::class);
        $result = $validator(0);
        $this->expectException(InvalidArray::class);
        $result = $validator(1);

        $this->expectException(InvalidArray::class);
        $result = $validator(42);

        $this->expectException(InvalidArray::class);
        $result = $validator(3.14159);

        $this->expectException(InvalidArray::class);
        $result = $validator(new class {});

        $this->expectException(InvalidArray::class);
        $result = $validator(fopen('php://input', 'r'));
    }

    public function testPositive()
    {

        $validator = new ArrayValidator();

        $result = $validator([]);
        $this->assertTrue($result);

        $result = $validator([1, 2, 3]);
        $this->assertTrue($result);

        $result = $validator(new Collection([1, 2, 3]));
        $this->assertTrue($result);
    }


}