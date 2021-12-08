<?php

namespace Ibragimoff\CryptoPayApi\Client\Response;

use ArrayObject;

/**
 * ArrayResponseFactory
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class ArrayResponseFactory implements HttpResponseFactoryInterface
{
    public function createModel(array $response, array $context = []): object
    {
        return new ArrayObject($response, $context['arrayFactory']['flags'] ?? 0);
    }
}