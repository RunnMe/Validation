<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Validator;
use Runn\Validation\Exceptions\InvalidInt;
use Runn\Validation\Exceptions\OutOfRange;

/**
 * Integer number validator - checks if value is valid integer number
 *
 * Class IntValidator
 * @package Runn\Validation\Validators
 */
class IntValidator
    extends Validator
{

    protected $min;
    protected $max;

    /**
     * @param int $min
     * @param int $max
     */
    public function __construct(int $min = null, int $max = null)
    {
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * @param mixed $value
     * @return bool
     * @throws \Runn\Validation\Exceptions\InvalidInt
     * @throws \Runn\Validation\Exceptions\OutOfRange
     */
    public function validate($value): bool
    {
        // To avoid true == 1
        if (is_bool($value)) {
            throw new InvalidInt($value);
        }

        // To accept strings with integer numbers
        if (is_string($value) && is_numeric($value)) {
            $value = (int)$value;
        }

        if ( false === filter_var($value, \FILTER_VALIDATE_INT) ) {
            throw new InvalidInt($value);
        }

        if (isset($this->min) || isset($this->max)) {
            $options = [];
            if (isset($this->min)) {
                $options['options']['min_range'] = $this->min;
            }
            if (isset($this->max)) {
                $options['options']['max_range'] = $this->max;
            }
            if ( false === filter_var($value, \FILTER_VALIDATE_INT, $options) ) {
                throw new OutOfRange($value);
            }
        }
        return true;
    }

}