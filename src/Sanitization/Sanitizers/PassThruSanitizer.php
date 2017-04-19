<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

/**
 * "Null" sanitizer - just passes throught any value
 *
 * Class PassThruSanitizer
 * @package Runn\Sanitization\Sanitizers
 */
class PassThruSanitizer extends Sanitizer
{

    /**
     * @param mixed $value
     * @return mixed
     */
    public function sanitize($value)
    {
        return $value;
    }

}