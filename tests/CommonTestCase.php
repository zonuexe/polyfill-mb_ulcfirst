<?php

declare(strict_types=1);

namespace zonuexe\Polyfill\MbLucfirst;

use Closure;
use PHPUnit\Framework\TestCase;
use function mb_internal_encoding;

abstract class CommonTestCase extends TestCase
{
    public function setUp(): void
    {
        mb_internal_encoding('UTF-8');
    }

    /**
     * @return array{mb_lcfirst: Closure, mb_ucfirst: Closure}
     */
    abstract public function getFunction(): array;

    /**
     * @covers ::mb_lcfirst
     * @dataProvider lcfirstProvider
     */
    public function test_mb_lcfirst(string $input, string $expected): void
    {
        $mb_lcfirst = $this->getFunction()['mb_lcfirst'];
        $this->assertSame($expected, $mb_lcfirst($input, 'UTF-8'));
    }

    /**
     * @covers ::mb_ucfirst
     * @dataProvider ucfirstProvider
     */
    public function test_mb_ucfirst(string $input, string $expected): void
    {
        $mb_ucfirst = $this->getFunction()['mb_ucfirst'];
        $this->assertSame($expected, $mb_ucfirst($input, 'UTF-8'));
    }

    /** @return iterable<array{input: string, expected: string}> */
    public static function emptyStringProvider()
    {
        yield 'Empty String' => ['input' => '', 'expected' => ''];
    }

    /** @return iterable<array{input: string, expected: string}> */
    public static function ucfirstProvider()
    {
        yield from self::emptyStringProvider();
        yield ['input' => 'ａｂ', 'expected' => 'Ａｂ'];
        yield ['input' => 'ＡＢＳ', 'expected' => 'ＡＢＳ'];
        yield ['input' => 'đắt quá!', 'expected' => 'Đắt quá!'];
        yield ['input' => 'აბგ', 'expected' => 'აბგ'];
        yield ['input' => 'ǉ', 'expected' => 'ǈ'];
    }

    /** @return iterable<array{input: string, expected: string}> */
    public static function lcfirstProvider()
    {
        yield from self::emptyStringProvider();
        yield ['input' => 'ＡＢＳ', 'expected' => 'ａＢＳ'];
        yield ['input' => 'Xin chào', 'expected' => 'xin chào'];
        yield ['input' => 'Đẹp quá!', 'expected' => 'đẹp quá!'];
    }
}
