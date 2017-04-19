<?php

namespace Runn\Validation;

/**
 * Interface ValidatorAwareInterface
 * @package Runn\Validation
 *
 * @codeCoverageIgnore
 */
interface ValidatorAwareInterface
{

    public function setValidator(/*?*/Validator $validator);

    public function getValidator(): /*?*/Validator;

}