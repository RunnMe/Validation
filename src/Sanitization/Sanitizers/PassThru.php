<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

class PassThru extends Sanitizer
{

    /**
     * @param mixed $value
     * @return mixed
     */
    public function sanitize($value)
    {
        return $value;
    }

}