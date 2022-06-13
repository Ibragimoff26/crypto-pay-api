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
    private ?string $description = null;
    private string $createdAt;
    private bool $allowComments;
    private bool $allowAnonymous;
    private ?string $expirationDate = null;
    private ?string $paidAt = null;
    private bool $paidAnonymously;
    private ?string $comment = null;
    private ?string $hiddenMessage = null;
    private ?string $payload = null;
    private ?string $paidBtnName = null;
    private ?string $paidBtnUrl = null;

    public function __construct(
        int    $invoiceId,
        string $status,
        string $hash,
        string $asset,
        string $amount,
        string $payUrl,
        string $createdAt,
        bool   $allowComments,
        bool   $allowAnonymous,
        bool   $paidAnonymously = false
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
        $this->paidAnonymously = $paidAnonymously;
    }

    public function getInvoiceId(): int
    {
        return $this->invoiceId;
    }

    public function setInvoiceId(int $invoiceId): InvoiceModel
    {
        $this->invoiceId = $invoiceId;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): InvoiceModel
    {
        $this->status = $status;
        return $this;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function setHash(string $hash): InvoiceModel
    {
        $this->hash = $hash;
        return $this;
    }

    public function getAsset(): string
    {
        return $this->asset;
    }

    public function setAsset(string $asset): InvoiceModel
    {
        $this->asset = $asset;
        return $this;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): InvoiceModel
    {
        $this->amount = $amount;
        return $this;
    }

    public function getPayUrl(): string
    {
        return $this->payUrl;
    }

    public function setPayUrl(string $payUrl): InvoiceModel
    {
        $this->payUrl = $payUrl;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): InvoiceModel
    {
        $this->description = $description;
        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): InvoiceModel
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function isAllowComments(): bool
    {
        return $this->allowComments;
    }

    public function setAllowComments(bool $allowComments): InvoiceModel
    {
        $this->allowComments = $allowComments;
        return $this;
    }

    public function isAllowAnonymous(): bool
    {
        return $this->allowAnonymous;
    }

    public function setAllowAnonymous(bool $allowAnonymous): InvoiceModel
    {
        $this->allowAnonymous = $allowAnonymous;
        return $this;
    }

    public function getExpirationDate(): ?string
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(?string $expirationDate): InvoiceModel
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    public function getPaidAt(): ?string
    {
        return $this->paidAt;
    }

    public function setPaidAt(?string $paidAt): InvoiceModel
    {
        $this->paidAt = $paidAt;
        return $this;
    }

    public function isPaidAnonymously(): bool
    {
        return $this->paidAnonymously;
    }

    public function setPaidAnonymously(bool $paidAnonymously): InvoiceModel
    {
        $this->paidAnonymously = $paidAnonymously;
        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): InvoiceModel
    {
        $this->comment = $comment;
        return $this;
    }

    public function getHiddenMessage(): ?string
    {
        return $this->hiddenMessage;
    }

    public function setHiddenMessage(?string $hiddenMessage): InvoiceModel
    {
        $this->hiddenMessage = $hiddenMessage;
        return $this;
    }

    public function getPayload(): ?string
    {
        return $this->payload;
    }

    public function setPayload(?string $payload): InvoiceModel
    {
        $this->payload = $payload;
        return $this;
    }

    public function getPaidBtnName(): ?string
    {
        return $this->paidBtnName;
    }

    public function setPaidBtnName(?string $paidBtnName): InvoiceModel
    {
        $this->paidBtnName = $paidBtnName;
        return $this;
    }

    public function getPaidBtnUrl(): ?string
    {
        return $this->paidBtnUrl;
    }

    public function setPaidBtnUrl(?string $paidBtnUrl): InvoiceModel
    {
        $this->paidBtnUrl = $paidBtnUrl;
        return $this;
    }
}