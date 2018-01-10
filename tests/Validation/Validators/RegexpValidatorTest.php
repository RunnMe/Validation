<?php

namespace Runn\tests\Validation\Validators\RegexpValidator;

use Runn\Validation\Validators\RegexpValidator;

class RegexpValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidString
     */
    public function testParentValidator()
    {
        $validator = new class extends RegexpValidator {};
        $validator([1,2,3]);
    }

    public function testPositive()
    {
        $validator = new class extends RegexpValidator {
            // @7.1
            protected const TEMPLATE = '~abc~';
        };

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

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidString
     */
    public function testNegativeEmpty()
    {
        $validator = new class extends RegexpValidator {
            // @7.1
            protected const TEMPLATE = '~abc~';
        };

        $result = $validator('');
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidString
     */
    public function testNegativeNotMatch()
    {
        $validator = new class extends RegexpValidator {
            // @7.1
            protected const TEMPLATE = '~abc~';
        };

        $result = $validator('foo');
    }

    /**
     * @expectedException \Runn\Validation\Exceptions\InvalidString
     */
    public function testNegativeNotMatchObject()
    {
        $validator = new class extends RegexpValidator {
            // @7.1
            protected const TEMPLATE = '~abc~';
        };

        $result = $validator(new class {public function __toString()
        {
            return 'foo';
        }
        });
    }

}
