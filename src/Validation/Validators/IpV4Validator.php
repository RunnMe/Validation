<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Validator;
use Runn\Validation\Exceptions\EmptyValue;
use Runn\Validation\Exceptions\InvalidIpV4;

/**
 * IP-address validator - checks if value is valid IP (v4) address
 *
 * Class IpV4Validator
 * @package Runn\Validation\Validators
 */
class IpV4Validator extends Validator
{

    /**
     * @param mixed $value
     * @return bool
     * @throws \Runn\Validation\Exceptions\EmptyValue
     * @throws \Runn\Validation\Exceptions\InvalidIpV4
     */
    public function validate($value): bool
    {
        if (empty($value)) {
            throw new EmptyValue($value);
        }

        if ( false === filter_var($value, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV4) ) {
            throw new InvalidIpV4($value);
        }

        return true;
    }

}