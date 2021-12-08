<?php

namespace Ibragimoff\CryptoPayApi\Model\GetBalance;

/**
 * GetBalanceResponse
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class GetBalanceResponse
{
    /**
     * @var CurrencyBalanceModel[]
     */
    private array $balances;

    public function __construct(array $balances)
    {
        $this->balances = $balances;
    }

    public function getBalances(): array
    {
        return $this->balances;
    }
}