<?php

namespace Ibragimoff\CryptoPayApi\Client\Exception;

use JetBrains\PhpStorm\Pure;
use Throwable;

/**
 * ResponseException
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class ResponseException extends \Exception
{
    private ?array $serverError;

    public function __construct($message = "", array $serverError = null, Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
        $this->serverError = $serverError;
    }

    /**
     * @return array|null
     */
    public function getServerError(): ?array
    {
        return $this->serverError;
    }
}