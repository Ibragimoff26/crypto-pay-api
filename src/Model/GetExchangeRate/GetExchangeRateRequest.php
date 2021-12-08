<?php

namespace Ibragimoff\CryptoPayApi\Model\GetExchangeRate;

use Ibragimoff\CryptoPayApi\Client\Request\BaseHttpRequest;
use Ibragimoff\CryptoPayApi\Client\Response\ArrayResponseFactory;
use Ibragimoff\CryptoPayApi\Client\Response\HttpResponseFactoryInterface;

/**
 * GetExchangeRateRequest
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class GetExchangeRateRequest extends BaseHttpRequest
{
    public function getUrl(): string
    {
        return 'getExchangeRates';
    }

    public function getResponseModelClass(): string
    {
        return ExchangeRateModel::class . '[]';
    }
}