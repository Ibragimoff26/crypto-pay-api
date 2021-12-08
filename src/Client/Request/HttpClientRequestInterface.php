<?php

namespace Ibragimoff\CryptoPayApi\Client\Request;

use Ibragimoff\CryptoPayApi\Client\Response\HttpResponseFactoryInterface;

/**
 * HttpClientRequestInterface
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
interface HttpClientRequestInterface
{
    public function getMethod(): string;
    public function getUrl(): string;
    public function getParameters(): array;
    public function getResponseModelClass(): string;
    public function getResponseModelFactory(): ?HttpResponseFactoryInterface;
}