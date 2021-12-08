<?php

namespace Ibragimoff\CryptoPayApi\Model\GetCurrencies;

/**
 * CurrencyModel
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class CurrencyModel
{
    private bool $isBlockchain;
    private bool $isStablecoin;
    private bool $isFiat;
    private string $name;
    private string $code;
    private int $decimals;

    public function __construct(bool $isBlockchain, bool $isStablecoin, bool $isFiat, string $name, string $code, int $decimals)
    {
        $this->isBlockchain = $isBlockchain;
        $this->isStablecoin = $isStablecoin;
        $this->isFiat = $isFiat;
        $this->name = $name;
        $this->code = $code;
        $this->decimals = $decimals;
    }

    public function isBlockchain(): bool
    {
        return $this->isBlockchain;
    }

    public function isStablecoin(): bool
    {
        return $this->isStablecoin;
    }

    public function isFiat(): bool
    {
        return $this->isFiat;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getDecimals(): int
    {
        return $this->decimals;
    }
}