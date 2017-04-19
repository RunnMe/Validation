<?php

namespace Runn\tests\Validation\Validators\StringValue;

use Runn\Validation\Validators\StringValue;

class StringValueTest extends \PHPUnit_Framework_TestCase
{

    public function testPositive()
    {
        $validator = new StringValue();

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

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidString
     */
    public function testNegativeArray()
    {
        $validator = new StringValue();
        $result = $validator([1, 2, 3]);
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidString
     */
    public function testNegativeObject()
    {
        $validator = new StringValue();
        $result = $validator(new class {});
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidString
     */
    public function testNegativeResource()
    {
        $validator = new StringValue();
        $result = $validator(fopen('php://input', 'r'));
    }

}