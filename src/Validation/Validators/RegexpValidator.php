<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Exceptions\InvalidString;
use Runn\Validation\Validator;

/**
 * String regexp validator - checks if value matches against PCRE template
 *
 * Class RegexpValidator
 * @package Runn\Validation\Validators
 */
abstract class RegexpValidator extends StringValidator
{

    protected const TEMPLATE = '~.*~';

    /**
     * @return string
     */
    protected function getTemplate()
    {
        return static::TEMPLATE;
    }

    /**
     * @param mixed $value
     * @return bool
     * @throws \Runn\Validation\Exceptions\InvalidString
     */
    public function validate($value): bool
    {
        if (false === parent::validate($value)) {
            // @codeCoverageIgnoreStart
            throw new InvalidString($value);
            // @codeCoverageIgnoreEnd
        }
        if (!preg_match($this->getTemplate(), (string)$value)) {
            throw new InvalidString($value);
        };
        return true;
    }

}
