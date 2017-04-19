<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Exceptions\InvalidString;
use Runn\Validation\Validator;

/**
 * String validator - checks if value is valid string
 *
 * Class StringValidator
 * @package Runn\Validation\Validators
 */
class StringValidator extends Validator
{

    /**
     * @param mixed $value
     * @return bool
     * @throws \Runn\Validation\Exceptions\InvalidString
     */
    public function validate($value): bool
    {
        if (is_array($value)) {
            throw new InvalidString($value);
        }
        if (is_object($value) && !is_callable([$value, '__toString'])) {
            throw new InvalidString($value);
        }
        if (is_resource($value)) {
            throw new InvalidString($value);
        }
        return true;
    }

}