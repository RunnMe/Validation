<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

/**
 * UUID sanitizer class - casts value to valid UUID
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

        $data[] = substr($value, 0, 8);
        $data[] = substr($value, 8, 4);
        $data[] = substr($value, 12, 4);
        $data[] = substr($value, 16, 4);
        $data[] = substr($value, 20, 12);
        $value = implode('-', $data);
        $value = '{' . strtoupper($value) . '}';

        return $value;
    }

}
