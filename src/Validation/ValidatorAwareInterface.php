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
     *
     * @7.1
     */
    public function setValidator(?Validator $validator);

    /**
     * @return \Runn\Validation\Validator
     *
     * @7.1
     */
    public function getValidator(): ?Validator;

}