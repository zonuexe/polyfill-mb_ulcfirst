<?php

declare(strict_types=1);

namespace zonuexe\Polyfill\MbLucfirst;

trait StringProvider
{
    /** @return iterable<array{input: string}> */
    public static function provideEmptyString()
    {
        yield 'Empty String' => ['input' => ''];
    }

    /** @return iterable<array{input: string}> */
    public static function provideUcfirst()
    {
        yield from self::provideEmptyString();
        yield ['input' => 'ａｂ'];
        yield ['input' => 'ＡＢＳ'];
        yield ['input' => 'đắt quá!'];
        yield ['input' => 'აბგ'];
        yield ['input' => 'ǉ'];
    }

    /** @return iterable<array{input: string}> */
    public static function provideLcfirst()
    {
        yield from self::provideEmptyString();
        yield ['input' => 'ＡＢＳ'];
        yield ['input' => 'Xin chào'];
        yield ['input' => 'Đẹp quá!'];
    }
}
