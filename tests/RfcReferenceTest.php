<?php

declare(strict_types=1);

namespace zonuexe\Polyfill\MbLucfirst;

/**
 * @covers RfcReference
 */
final class RfcReferenceTest extends CommonTestCase
{
    public function getFunction(): array
    {
        return [
            'mb_lcfirst' => function (string $string, ?string $encoding = null): string {
                return RfcReference::mb_lcfirst($string, $encoding);
            },
            'mb_ucfirst' => function (string $string, ?string $encoding = null): string {
                return RfcReference::mb_ucfirst($string, $encoding);
            },
        ];
    }
}
