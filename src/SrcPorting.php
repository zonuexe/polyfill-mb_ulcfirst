<?php

declare(strict_types=1);

namespace zonuexe\Polyfill\MbLucfirst;

use function mb_convert_case;
use function mb_strtolower;
use function mb_substr;
use const MB_CASE_LOWER;
use const MB_CASE_TITLE;

class SrcPorting
{
    public static function mb_ucfirst(string $string, ?string $encoding = null): string
    {
        return self::php_mb_ulcfirst($string, MB_CASE_TITLE, $encoding);
    }

    public static function mb_lcfirst(string $string, ?string $encoding = null): string
    {
        return self::php_mb_ulcfirst($string, MB_CASE_LOWER, $encoding);
    }

    private static function php_mb_ulcfirst(string $string, int $mode, ?string $encoding = null): string
    {
        $first = mb_substr($string, 0, 1, $encoding);
        $head = mb_convert_case($first, $mode, $encoding);

        if ($first === $head) {
            return $string;
        }

        return $head . mb_substr($string, 1, null, $encoding);
    }
}
