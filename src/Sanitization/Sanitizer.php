<?php

namespace Runn\Sanitization;

/**
 * Abstract sanitizer class
 *
 * Class Sanitizer
 * @package Runn\Sanitization
 */
abstract class Sanitizer
{

    /**
     * @param mixed $value
     * @return mixed
     */
    abstract public function sanitize($value);

    /**
     * @param mixed $value
     * @return mixed
     */
    final public function __invoke($value)
    {
        return $this->sanitize($value);
    }

}