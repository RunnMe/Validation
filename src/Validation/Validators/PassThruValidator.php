<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Validator;

/**
 * "Pass Thru" validator - always returns true
 *
 * Class PassThruValidator
 * @package Runn\Validation\Validators
 */
class PassThruValidator extends Validator
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