<?php

namespace Runn\tests\Validation\Validators\EnumValidator;

use PHPUnit\Framework\TestCase;
use Runn\Core\Collection;
use Runn\Validation\Exceptions\OutOfEnum;
use Runn\Validation\Validators\EnumValidator;

class EnumValidatorTest extends TestCase
{

    public function testEmpty()
    {
        $validator = new EnumValidator();

        $this->expectException(OutOfEnum::class);
        $validator->validate('foo');
    }

    public function testPositive()
    {
        $validator = new EnumValidator(['foo', 'bar']);
        $this->assertTrue($validator->validate('foo'));

        $validator = new EnumValidator(new Collection(['foo', 'bar']));
        $this->assertTrue($validator->validate('foo'));
    }

    public function testNegative()
    {
        $validator = new EnumValidator(['foo', 'bar']);

        $this->expectException(OutOfEnum::class);
        $validator->validate('baz');
    }

}
