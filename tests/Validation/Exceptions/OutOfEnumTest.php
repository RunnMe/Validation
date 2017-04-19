<?php

namespace Runn\tests\Validation\Exceptions\OutOfEnum;

use Runn\Validation\Exceptions\OutOfEnum;

class OutOfEnumTest extends \PHPUnit_Framework_TestCase
{

    public function testGetSetValues()
    {
        $error = new OutOfEnum();
        $ret = $error->setValues([1, 2, 3]);

        $this->assertSame($error, $ret);
        $this->assertSame([1, 2, 3], $error->getValues());
    }

}