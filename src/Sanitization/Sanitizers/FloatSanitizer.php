<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

/**
 * Float number sanitizer class - casts value to float number
 *
 * Class FloatSanitizer
 * @package Runn\Sanitization\Sanitizers
 */
class FloatSanitizer extends Sanitizer
{

    /**
     * @param mixed $value
     * @return float
     */
    public function sanitize($value): float
    {
        return (float)$value;
    }

}