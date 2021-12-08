<?php

namespace Ibragimoff\CryptoPayApi\Model\GetMe;

use Ibragimoff\CryptoPayApi\Client\Request\BaseHttpRequest;
use Ibragimoff\CryptoPayApi\Client\Response\HttpResponseFactoryInterface;

/**
 * GetMeRequest
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class GetMeRequest extends BaseHttpRequest
{
    public function getUrl(): string
    {
        return 'getMe';
    }

    public function getResponseModelClass(): string
    {
        return GetMeResponse::class;
    }
}