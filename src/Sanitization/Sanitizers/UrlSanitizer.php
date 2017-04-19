<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

/**
 * URL sanitizer class
 *
 * Class UrlSanitizer
 * @package Runn\Sanitization\Sanitizers
 */
class UrlSanitizer extends Sanitizer
{

    /**
     * @param mixed $value
     * @return string
     */
    public function sanitize($value): string
    {
        return filter_var($value, \FILTER_SANITIZE_URL);
    }

}