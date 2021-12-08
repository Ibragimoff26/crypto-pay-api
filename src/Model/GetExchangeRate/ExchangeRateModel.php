<?php

namespace Ibragimoff\CryptoPayApi\Model\GetExchangeRate;

/**
 * ExchangeRateModel
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class ExchangeRateModel
{
    private bool $isValid;
    private string $source;
    private string $target;
    private string $rate;

    public function __construct(bool $isValid, string $source, string $target, string $rate)
    {
        $this->isValid = $isValid;
        $this->source = $source;
        $this->target = $target;
        $this->rate = $rate;
    }

    public function isValid(): bool
    {
        return $this->isValid;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function getTarget(): string
    {
        return $this->target;
    }

    public function getRate(): string
    {
        return $this->rate;
    }
}