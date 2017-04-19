<?php

namespace Runn\tests\Validation\Validators\EnumValidator;

use Runn\Core\Collection;
use Runn\Validation\Validators\EnumValidator;

class EnumValidatorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \Runn\Validation\Exceptions\OutOfEnum
     */
    public function testEmpty()
    {
        $validator = new EnumValidator();
        $validator->validate('foo');
    }

    public function testPositive()
    {
        $validator = new EnumValidator(['foo', 'bar']);
        $this->assertTrue($validator->validate('foo'));

        $validator = new EnumValidator(new Collection(['foo', 'bar']));
        $this->assertTrue($validator->validate('foo'));
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\OutOfEnum
     */
    public function testNegative()
    {
        $validator = new EnumValidator(['foo', 'bar']);
        $this->assertTrue($validator->validate('baz'));
    }

}