<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

/**
 * UUID sanitizer class - cast value to valid UUID
 *
 * Class UuidSanitizer
 * @package Runn\Sanitization\Sanitizers
 */
class UuidSanitizer extends Sanitizer
{

    /**
     * @param mixed $value
     * @return string
     */
    public function sanitize($value): string
    {
        $value = preg_replace('~[^0-9A-F]~i', '', $value);
        preg_match('~(.{8})(.{4})(.{4})(.{4})(.{12})~i', $value, $matches);
        array_shift($matches);
        $value = implode('-', $matches);
        $value = '{' . strtoupper($value) . '}';

        return $value;
    }
}
