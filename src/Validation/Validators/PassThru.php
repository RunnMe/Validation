<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Validator;

class PassThru extends Validator
{

    /**
     * @param mixed $value
     * @return bool
     */
    public function validate($value): bool
    {
        return true;
    }

}