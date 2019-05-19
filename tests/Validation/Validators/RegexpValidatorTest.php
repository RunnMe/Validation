<?php

namespace Runn\tests\Validation\Validators\RegexpValidator;

use PHPUnit\Framework\TestCase;
use Runn\Validation\Exceptions\InvalidString;
use Runn\Validation\Validators\RegexpValidator;

class RegexpValidatorTest extends TestCase
{
    public function testParentValidator()
    {
        $this->expectException(\ArgumentCountError::class);
        $validator = new RegexpValidator;
    }

    public function testPositive()
    {
        $validator = new RegexpValidator('~abc~');

        $result = $validator('abc');
        $this->assertTrue($result);

        $result = $validator('111abc222');
        $this->assertTrue($result);

        $result = $validator(new class {public function __toString()
            {
                return 'abc';
            }
        });
        $this->assertTrue($result);
    }

    public function testNegativeEmpty()
    {
        $validator = new RegexpValidator('~abc~');

        $this->expectException(InvalidString::class);
        $validator('');
    }

    public function testNegativeNotMatch()
    {
        $validator = new RegexpValidator('~abc~');

        $this->expectException(InvalidString::class);
        $validator('foo');
    }

    public function testNegativeNotMatchObject()
    {
        $validator = new RegexpValidator('~abc~');

        $this->expectException(InvalidString::class);
        $validator(new class {public function __toString()
        {
            return 'foo';
        }
        });
    }

}
