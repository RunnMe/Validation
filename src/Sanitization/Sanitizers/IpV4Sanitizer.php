<?php

namespace Runn\Sanitization\Sanitizers;

use Runn\Sanitization\Sanitizer;

/**
 * IP-address (v4) sanitizer class
 *
 * Class IpV4Sanitizer
 * @package Runn\Sanitization\Sanitizers
 */
class IpV4Sanitizer extends Sanitizer
{

    /**
     * @param mixed $value
     * @return string
     */
    public function sanitize($value): string
    {
        $value = preg_replace('~[^0-9\.]~', '', $value);
        if ( false !== filter_var($value, \FILTER_VALIDATE_IP, \FILTER_FLAG_IPV4) ) {
            return $value;
        } else {
            return '0.0.0.0';
        }
    }

}