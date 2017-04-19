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
     * @param array $values
     */
    public function __construct(array/*iterable*/ $values = [])
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
        if (!in_array($value, $this->values)) {
            throw (new OutOfEnum($value))->setValues($this->values);
        }
        return true;
    }

}