<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Core\ArrayCastingInterface;
use Runn\Sanitization\Sanitizer;

class ArrayValue extends Sanitizer
{

    /**
     * @param mixed $value
     * @return array|\Runn\Core\ArrayCastingInterface
     */
    public function sanitize($value)
    {
        if (
            is_array($value)
            ||
            (is_object($value) && is_subclass_of($value, ArrayCastingInterface::class))
        ) {
            return $value;
        }

        if (false === $value || '' === $value) {
            return [];
        }

        return (array)$value;
    }

}