<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Validator;
use Runn\Validation\Exceptions\EmptyValue;
use Runn\Validation\Exceptions\InvalidUrl;

/**
 * URL validator - checks if value is valid URL
 *
 * Class UrlValidator
 * @package Runn\Validation\Validators
 */
class UrlValidator extends Validator
{

    /**
     * @param mixed $value
     * @return bool
     * @throws \Runn\Validation\Exceptions\EmptyValue
     * @throws \Runn\Validation\Exceptions\InvalidUrl
     */
    public function validate($value): bool
    {
        if (empty($value)) {
            throw new EmptyValue($value);
        }

        if ( false === filter_var($value, \FILTER_VALIDATE_URL) ) {
            throw new InvalidUrl($value);
        }

        return true;
    }

}