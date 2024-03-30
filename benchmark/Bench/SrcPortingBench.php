<?php

declare(strict_types=1);

namespace zonuexe\Polyfill\MbLucfirst;

/**
 * @Revs(10)
 * @Iterations(1)
 */
class SrcPortingBench
{
    use StringProvider;

    /**
     * @Warmup
     * @ParamProviders("provideUcfirst")
     * @param array{input: string} $param
     */
    public function benchUcfirst($param): void
    {
        $_ = SrcPorting::mb_ucfirst($param['input']);
    }

    /**
     * @Warmup
     * @ParamProviders("provideLcfirst")
     * @param array{input: string} $param
     */
    public function benchLcfirst($param): void
    {
        $_ = SrcPorting::mb_lcfirst($param['input']);
    }
}
