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
     *
     * @7.1
     */
    public function setSanitizer(?Sanitizer $sanitizer);

    /**
     * @return \Runn\Sanitization\Sanitizer|null
     *
     * @7.1
     */
    public function getSanitizer(): ?Sanitizer;

}