<?php

namespace Ibragimoff\CryptoPayApi\Model\GetBalance;

/**
 * CurrencyBalanceModel
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class CurrencyBalanceModel
{
    private string $currencyCode;
    private string $available;

    public function __construct(string $currencyCode, string $available)
    {
        $this->currencyCode = $currencyCode;
        $this->available = $available;
    }

    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }

    public function getAvailable(): string
    {
        return $this->available;
    }
}