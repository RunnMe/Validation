<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Validator;
use Runn\Validation\Exceptions\InvalidBoolean;

/**
 * Boolean validator - checks if value can be casted to boolean
 *
 * Class BooleanValidator
 * @package Runn\Validation\Validators
 */
class BooleanValidator extends Validator
{

    /**
     * @param mixed $value
     * @return bool
     * @throws \Runn\Validation\Exceptions\InvalidBoolean
     */
    public function validate($value): bool
    {
        if (!is_scalar($value) && !is_null($value)) {
            throw new InvalidBoolean($value);
        }
        return true;
    }

}