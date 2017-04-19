<?php

namespace Runn\Validation\Validators;

use Runn\Core\ArrayCastingInterface;
use Runn\Validation\Exceptions\InvalidArray;
use Runn\Validation\Validator;

/**
 * Array validator - checks if value is array or has ArrayCastingInterface
 *
 * Class ArrayValidator
 * @package Runn\Validation\Validators
 */
class ArrayValidator extends Validator
{

    /**
     * @param mixed $value
     * @return bool
     * @throws \Runn\Validation\Exceptions\InvalidArray
     */
    public function validate($value): bool
    {
        if (
            !is_array($value)
            &&
            !(is_object($value) && is_subclass_of($value, ArrayCastingInterface::class))
        ) {
            throw new InvalidArray($value);
        }
        return true;
    }

}