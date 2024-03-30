<?php

declare(strict_types=1);

namespace zonuexe\Polyfill\MbLucfirst;

/**
 * @covers SrcPorting
 */
final class SrcPortingTest extends CommonTestCase
{
    public function getFunction(): array
    {
        return [
            'mb_lcfirst' => function (string $string, ?string $encoding = null): string {
                return SrcPorting::mb_lcfirst($string, $encoding);
            },
            'mb_ucfirst' => function (string $string, ?string $encoding = null): string {
                return SrcPorting::mb_ucfirst($string, $encoding);
            },
        ];
    }
}
