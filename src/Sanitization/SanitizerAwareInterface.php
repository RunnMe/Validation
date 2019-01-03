<?php

namespace Runn\Sanitization;

/**
 * Interface SanitizerAwareInterface
 * @package Runn\Sanitization
 *
 * @codeCoverageIgnore
 */
interface SanitizerAwareInterface
{

    /**
     * @param \Runn\Sanitization\Sanitizer|null $sanitizer
     * @return $this
     */
    public function setSanitizer(?Sanitizer $sanitizer);

    /**
     * @return \Runn\Sanitization\Sanitizer|null
     */
    public function getSanitizer(): ?Sanitizer;

}