<?php

namespace Ibragimoff\CryptoPayApi\Model\GetCurrencies;

use Ibragimoff\CryptoPayApi\Client\Request\BaseHttpRequest;
use Ibragimoff\CryptoPayApi\Client\Response\ArrayResponseFactory;
use Ibragimoff\CryptoPayApi\Client\Response\HttpResponseFactoryInterface;

/**
 * GetCurrenciesRequest
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class GetCurrenciesRequest extends BaseHttpRequest
{
    public function getUrl(): string
    {
        return 'getCurrencies';
    }

    public function getResponseModelClass(): string
    {
        return CurrencyModel::class . '[]';
    }
}