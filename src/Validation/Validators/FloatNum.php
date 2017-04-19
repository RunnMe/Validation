<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Exceptions\InvalidFloat;
use Runn\Validation\Validator;

class FloatNum
    extends Validator
{

    /**
     * @param mixed $value
     * @return bool
     * @throws \Runn\Validation\Exceptions\InvalidFloat
     * @throws \Runn\Validation\Exceptions\OutOfRange
     */
    public function validate($value): bool
    {
        // To avoid true == 1.0
        if (is_bool($value)) {
            throw new InvalidFloat($value);
        }

        // To accept strings with integer numbers
        if (is_string($value) && is_numeric($value)) {
            $value = (float)$value;
        }

        if ( false === filter_var($value, \FILTER_VALIDATE_FLOAT) ) {
            throw new InvalidFloat($value);
        }

        return true;
    }

}