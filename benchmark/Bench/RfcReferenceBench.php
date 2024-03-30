<?php

declare(strict_types=1);

namespace zonuexe\Polyfill\MbLucfirst;

/**
 * @Revs(10)
 * @Iterations(1)
 */
class RfcReferenceBench
{
    use StringProvider;

    /**
     * @Warmup
     * @ParamProviders("provideUcfirst")
     * @param array{input: string} $param
     */
    public function benchUcfirst($param): void
    {
        $_ = RfcReference::mb_ucfirst($param['input']);
    }

    /**
     * @Warmup
     * @ParamProviders("provideLcfirst")
     * @param array{input: string} $param
     */
    public function benchLcfirst($param): void
    {
        $_ = RfcReference::mb_lcfirst($param['input']);
    }
}
