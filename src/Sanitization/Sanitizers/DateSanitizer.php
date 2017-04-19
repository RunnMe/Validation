<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

/**
 * Date sanitizer class - casts value to DateTime object without time
 *
 * Class DateSanitizer
 * @package Runn\Sanitization\Sanitizers
 */
class DateSanitizer
    extends Sanitizer
{

    /**
     * @param mixed $value
     * @return \DateTimeInterface
     */
    public function sanitize($value): \DateTimeInterface
    {
        if ($value instanceof \DateTimeInterface) {
            $value = $value->format('Y-m-d');
        }
        return (new \DateTime($value))->setTime(0, 0, 0);
    }

}