<?php

namespace Runn\Validation\Validators;

use Runn\Validation\Exceptions\InvalidString;

/**
 * String regexp validator - checks if value matches against PCRE template
 *
 * Class RegexpValidator
 * @package Runn\Validation\Validators
 */
class RegexpValidator extends StringValidator
{

    protected $template;

    /**
     * RegexpValidator constructor.
     * @param string $template
     */
    public function __construct(string $template)
    {
        $this->template = $template;
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
        if (!preg_match($this->template, (string)$value)) {
            throw new InvalidString($value);
        };
        return true;
    }

}
