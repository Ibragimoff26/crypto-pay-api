<?php

namespace Ibragimoff\CryptoPayApi\Client\Request;

use Ibragimoff\CryptoPayApi\Client\Response\HttpResponseFactoryInterface;

/**
 * BaseHttpRequest
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
abstract class BaseHttpRequest implements HttpClientRequestInterface
{
    private array $queryParams = [];

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getParameters(): array
    {
        return [];
    }

    public function getResponseModelClass(): string
    {
        return '';
    }

    public function getResponseModelFactory(): ?HttpResponseFactoryInterface
    {
        return null;
    }
}