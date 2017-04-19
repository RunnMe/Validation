<?php

namespace Runn\tests\Validation\Validators\Enum;

use Runn\Validation\Validators\Enum;

class EnumTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @expectedException \Runn\Validation\Exceptions\OutOfEnum
     */
    public function testEmpty()
    {
        $validator = new Enum();
        $validator->validate('foo');
    }

    public function testPositive()
    {
        $validator = new Enum(['foo', 'bar']);
        $this->assertTrue($validator->validate('foo'));
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\OutOfEnum
     */
    public function testNegative()
    {
        $validator = new Enum(['foo', 'bar']);
        $this->assertTrue($validator->validate('baz'));
    }

}