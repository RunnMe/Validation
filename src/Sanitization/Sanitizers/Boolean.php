<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

class Boolean extends Sanitizer
{

    /**
     * @param mixed $value
     * @return bool
     */
    public function sanitize($value): bool
    {
        if (is_string($value) && in_array($value, ['false', 'off', 'no'])) {
            return false;
        }
        return (bool)$value;
    }

}