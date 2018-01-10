<?php

namespace Runn\Validation;

/**
 * Abstract validator class
 *
 * Class Validator
 * @package Runn\Validation
 */
abstract class Validator
{

    /**
     * @param mixed $value
     * @return bool
     */
    abstract public function validate($value): bool;

    /**
     * @param mixed $value
     * @return bool
     */
    final public function __invoke($value): bool
    {
        return $this->validate($value);
    }

}
