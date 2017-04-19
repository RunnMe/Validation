<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Validator;
use Runn\Validation\Exceptions\InvalidBoolean;

class Boolean extends Validator
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