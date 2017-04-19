<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

/**
 * Integer number sanitizer class - casts value to integer number
 *
 * Class IntSanitizer
 * @package Runn\Sanitization\Sanitizers
 */
class IntSanitizer extends Sanitizer
{

    /**
     * @param mixed $value
     * @return int
     */
    public function sanitize($value): int
    {
        return (int)filter_var($value, \FILTER_SANITIZE_NUMBER_INT);
    }

}