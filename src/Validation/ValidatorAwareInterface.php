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

    /**
     * @param \Runn\Validation\Validator|null $validator
     * @return $this
     */
    public function setValidator(?Validator $validator);

    /**
     * @return \Runn\Validation\Validator
     */
    public function getValidator(): ?Validator;

}