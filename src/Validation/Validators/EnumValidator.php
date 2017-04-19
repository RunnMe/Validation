<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Exceptions\OutOfEnum;
use Runn\Validation\Validator;

/**
 * Enum validator - checks if value is in valid values list
 *
 * Class EnumValidator
 * @package Runn\Validation\Validators
 */
class EnumValidator
    extends Validator
{

    protected $values = [];

    /**
     * @param iterable $values
     */
    public function __construct(iterable $values = [])
    {
        $this->values = $values;
    }

    /**
     * @param mixed $value
     * @return bool
     * @throws \Runn\Validation\Exceptions\OutOfEnum
     */
    public function validate($value): bool
    {
        foreach ($this->values as $val) {
            if ($val == $value) {
                return true;
            }
        }
        throw (new OutOfEnum($value))->setValues($this->values);
    }

}