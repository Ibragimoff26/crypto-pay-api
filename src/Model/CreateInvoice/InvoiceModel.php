<?php

namespace Ibragimoff\CryptoPayApi\Model\CreateInvoice;

/**
 * InvoiceModel
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class InvoiceModel
{
    private int $invoiceId;
    private string $status;
    private string $hash;
    private string $asset;
    private string $amount;
    private string $payUrl;
    private string $createdAt;
    private bool $allowComments;
    private bool $allowAnonymous;

    public function __construct(
        int $invoiceId,
        string $status,
        string $hash,
        string $asset,
        string $amount,
        string $payUrl,
        string $createdAt,
        bool $allowComments,
        bool $allowAnonymous
    ) {
        $this->invoiceId = $invoiceId;
        $this->status = $status;
        $this->hash = $hash;
        $this->asset = $asset;
        $this->amount = $amount;
        $this->payUrl = $payUrl;
        $this->createdAt = $createdAt;
        $this->allowComments = $allowComments;
        $this->allowAnonymous = $allowAnonymous;
    }

    public function getInvoiceId(): int
    {
        return $this->invoiceId;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getAsset(): string
    {
        return $this->asset;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getPayUrl(): string
    {
        return $this->payUrl;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function isAllowComments(): bool
    {
        return $this->allowComments;
    }

    public function isAllowAnonymous(): bool
    {
        return $this->allowAnonymous;
    }
}