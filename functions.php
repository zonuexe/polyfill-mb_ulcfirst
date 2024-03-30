<?php

use zonuexe\Polyfill\MbLucfirst\RfcReference as _;

if (!function_exists('mb_ucfirst')) {
    function mb_ucfirst(string $string, ?string $encoding = null): string
    {
        return _::mb_ucfirst($string, $encoding);
    }
}

if (!function_exists('mb_lcfirst'))  {
    function mb_lcfirst(string $string, ?string $encoding = null): string
    {
        return _::mb_lcfirst($string, $encoding);
    }
}
