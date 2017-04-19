<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

/**
 * String value sanitizer class - casts value to string
 *
 * Class StringSanitizer
 * @package Runn\Sanitization\Sanitizers
 */
class StringSanitizer extends Sanitizer
{

    /**
     * @param mixed $value
     * @return string
     */
    public function sanitize($value): string
    {
        return (string)$value;
    }

}