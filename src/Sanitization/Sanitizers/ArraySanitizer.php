<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Core\ArrayCastingInterface;
use Runn\Sanitization\Sanitizer;

/**
 * Array sanitizer class - casts value to array or to ArrayCastingInterface object
 *
 * Class ArraySanitizer
 * @package Runn\Sanitization\Sanitizers
 */
class ArraySanitizer extends Sanitizer
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