<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Exceptions\EmptyValue;
use Runn\Validation\Exceptions\InvalidUuid;
use Runn\Validation\Validator;

/**
 * UuidValidator - checks if value is valid UUID
 *
 * Class UuidValidator
 * @package Runn\Validation\Validators
 */
class UuidValidator extends Validator
{

    /**
     * @param mixed $value
     * @return bool
     * @throws \Runn\Validation\Exceptions\EmptyValue
     * @throws \Runn\Validation\Exceptions\InvalidUuid
     */
    public function validate($value): bool
    {
        if (empty($value)) {
            throw new EmptyValue($value);
        }

        if (!is_string($value)) {
            throw new InvalidUuid($value);
        }

        $sanitizedValue = preg_replace('~[^0-9A-F]~i', '', $value);
        if (32 !== strlen($sanitizedValue)) {
            throw new InvalidUuid($value);
        }

        return true;
    }

}
