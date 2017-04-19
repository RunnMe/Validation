<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

class IntNum extends Sanitizer
{

    /**
     * @param mixed $value
     * @return int
     */
    public function sanitize($value): int
    {
        return (int)filter_var($value, \FILTER_SANITIZE_NUMBER_INT);
    }

}