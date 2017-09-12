<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

/**
 * Email sanitizer class - casts value to valid email (string)
 * 
 * Class EmailSanitizer
 * @package Runn\Sanitization\Sanitizers
 */
class EmailSanitizer extends Sanitizer
{

    /**
     * @param mixed $value
     * @return string
     */
    public function sanitize($value): string
    {
        return filter_var($value, \FILTER_SANITIZE_EMAIL);
    }

}