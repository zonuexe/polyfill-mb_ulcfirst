<?php

declare(strict_types=1);

namespace zonuexe\Polyfill\MbLucfirst;

use function mb_convert_case;
use function mb_strtolower;
use function mb_substr;
use const MB_CASE_TITLE;

class RfcReference
{
    public static function mb_ucfirst(string $string, ?string $encoding = null): string
    {
        return mb_convert_case(mb_substr($string, 0, 1, $encoding), MB_CASE_TITLE, $encoding) .
            mb_substr($string, 1, null, $encoding);
    }

    public static function mb_lcfirst(string $string, ?string $encoding = null): string
    {
        return mb_strtolower(mb_substr($string, 0, 1, $encoding), $encoding) .
            mb_substr($string, 1, null, $encoding);
    }
}
