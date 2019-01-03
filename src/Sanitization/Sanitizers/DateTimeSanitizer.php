<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Core\DateTime;
use Runn\Sanitization\Sanitizer;

/**
 * Date and time sanitizer class - casts value to DateTime object
 *
 * Class DateTimeSanitizer
 * @package Runn\Sanitization\Sanitizers
 */
class DateTimeSanitizer
    extends Sanitizer
{

    /**
     * @param mixed $value
     * @return \DateTimeInterface
     */
    public function sanitize($value): \DateTimeInterface
    {
        if ($value instanceof \DateTimeInterface) {
            $value = $value->format('c');
        }
        return new DateTime($value);
    }

}