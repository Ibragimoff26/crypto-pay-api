<?php

namespace Ibragimoff\CryptoPayApi\Model\GetMe;

/**
 * GetMeResponse
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class GetMeResponse
{
    private int $appId;
    private string $name;
    private string $paymentProcessingBotUsername;

    public function __construct(int $appId, string $name, string $paymentProcessingBotUsername)
    {
        $this->appId = $appId;
        $this->name = $name;
        $this->paymentProcessingBotUsername = $paymentProcessingBotUsername;
    }

    public function getAppId(): int
    {
        return $this->appId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPaymentProcessingBotUsername(): string
    {
        return $this->paymentProcessingBotUsername;
    }
}