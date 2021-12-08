<?php

namespace Ibragimoff\CryptoPayApi\Client\Response;

/**
 * HttpResponseFactoryInterface
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
interface HttpResponseFactoryInterface
{
    public function createModel(array $response, array $context = []): object;
}