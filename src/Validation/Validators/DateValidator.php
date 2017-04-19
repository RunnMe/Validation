<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Validator;
use Runn\Validation\Exceptions\EmptyValue;
use Runn\Validation\Exceptions\InvalidDate;

/**
 * Date validator - checks if value is valid date
 *
 * Class DateValidator
 * @package Runn\Validation\Validators
 */
class DateValidator
    extends Validator
{

    /**
     * @param mixed $value
     * @return bool
     * @throws \Runn\Validation\Exceptions\EmptyValue
     * @throws \Runn\Validation\Exceptions\InvalidDate
     */
    public function validate($value): bool
    {
        // To avoid "true is not empty"
        if (is_bool($value)) {
            throw new InvalidDate($value);
        }

        if ($value instanceof \DateTimeInterface) {
            return true;
        }

        if (is_array($value) || is_object($value) || is_resource($value)) {
            throw new InvalidDate($value);
        }

        if (empty($value)) {
            throw new EmptyValue($value);
        }

        if ( false === strtotime($value) ) {
            throw new InvalidDate($value);
        };

        return true;
    }

}