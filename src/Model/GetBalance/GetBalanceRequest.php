<?php

namespace Ibragimoff\CryptoPayApi\Model\GetBalance;

use Ibragimoff\CryptoPayApi\Client\Request\BaseHttpRequest;

/**
 * GetBalanceRequest
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class GetBalanceRequest extends BaseHttpRequest
{
    public function getUrl(): string
    {
        return 'getBalance';
    }

    public function getResponseModelClass(): string
    {
        return CurrencyBalanceModel::class . '[]';
    }
}