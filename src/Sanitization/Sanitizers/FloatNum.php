<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

class FloatNum extends Sanitizer
{

    /**
     * @param mixed $value
     * @return float
     */
    public function sanitize($value): float
    {
        return (float)$value;
    }

}