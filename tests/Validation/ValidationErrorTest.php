<?php

namespace Runn\tests\Validation\ValidationError;

use Runn\Validation\ValidationError;

class ValidationErrorTest extends \PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $error = new ValidationError(42, 'Invalid value', 100);

        $this->assertInstanceOf(\Throwable::class, $error);
        $this->assertEquals(42, $error->value);
        $this->assertEquals(42, $error->getValue());
        $this->assertEquals('Invalid value', $error->getMessage());
        $this->assertEquals(100, $error->getCode());
    }

}