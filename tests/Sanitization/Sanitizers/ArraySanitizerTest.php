<?php

namespace Runn\tests\Sanitization\Sanitizers\ArraySanitizer;

use Runn\Core\Collection;
use Runn\Sanitization\Sanitizers\ArraySanitizer;

class ArraySanitizerTest extends \PHPUnit_Framework_TestCase
{

    public function testScalar()
    {
        $sanitizer = new ArraySanitizer;

        $result = $sanitizer(null);
        $this->assertSame([], $result);

        $result = $sanitizer(false);
        $this->assertSame([], $result);
        $result = $sanitizer(true);
        $this->assertSame([true], $result);

        $result = $sanitizer(42);
        $this->assertSame([42], $result);
        $result = $sanitizer(3.14159);
        $this->assertSame([3.14159], $result);

        $result = $sanitizer('');
        $this->assertSame([], $result);

        $result = $sanitizer('foo');
        $this->assertSame(['foo'], $result);

        $obj = new \stdClass();
        $result = $sanitizer($obj);
        $this->assertSame([], $result);

        $obj = new \stdClass();
        $obj->foo = 'bar';
        $result = $sanitizer($obj);
        $this->assertSame(['foo' => 'bar'], $result);
    }

    public function testArray()
    {
        $sanitizer = new ArraySanitizer;

        $result = $sanitizer([]);
        $this->assertSame([], $result);

        $result = $sanitizer([1, 2, 3]);
        $this->assertSame([1, 2, 3], $result);
    }

    public function testArrayAble()
    {
        $sanitizer = new ArraySanitizer;

        $collection = new Collection;
        $result = $sanitizer($collection);
        $this->assertSame($collection, $result);

        $collection = new Collection([1, 2, 3]);
        $result = $sanitizer($collection);
        $this->assertSame($collection, $result);
    }

}