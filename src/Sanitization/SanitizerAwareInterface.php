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

    public function setSanitizer(/*?*/Sanitizer $sanitizer);

    public function getSanitizer(): /*?*/Sanitizer;

}