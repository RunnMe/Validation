<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Validator;
use Runn\Validation\Exceptions\EmptyValue;
use Runn\Validation\Exceptions\InvalidEmail;

/**
 * Email validator - checks if value is valid email
 *
 * Class EmailValidator
 * @package Runn\Validation\Validators
 */
class EmailValidator extends Validator
{

    /**
     * @param mixed $value
     * @return bool
     * @throws \Runn\Validation\Exceptions\EmptyValue
     * @throws \Runn\Validation\Exceptions\InvalidEmail
     */
    public function validate($value): bool
    {
        if (empty($value)) {
            throw new EmptyValue($value);
        }

        if ( false === filter_var($value, \FILTER_VALIDATE_EMAIL) ) {
            throw new InvalidEmail($value);
        }

        return true;
    }

}