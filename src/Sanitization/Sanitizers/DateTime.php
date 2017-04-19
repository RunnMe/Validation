<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

/**
 * Class DateTime
 * @package Runn\Sanitization\Sanitizers
 */
class DateTime
    extends Sanitizer
{

    /**
     * @param mixed $value
     * @return \DateTimeInterface
     */
    public function sanitize($value): \DateTimeInterface
    {
        if ($value instanceof \DateTimeInterface) {
            return $value;
        }
        return new \DateTime($value);
    }

}