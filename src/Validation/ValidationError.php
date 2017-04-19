<?php

namespace Runn\Validation;

use Runn\Core\Exception;

/**
 * Class ValidationError
 * @package Runn\Validation
 *
 * @property mixed $value
 */
class ValidationError
    extends Exception
{

    public $value;

    /**
     * @param mixed $value
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct($value = null, $message = "", $code = 0, \Throwable $previous = null)
    {
        $this->setValue($value);
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $val
     * @return $this
     */
    public function setValue($val)
    {
        $this->value = $val;
        return $this;
    }

}