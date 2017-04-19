<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

/**
 * Class Date
 * @package Runn\Sanitization\Sanitizers
 */
class Date
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