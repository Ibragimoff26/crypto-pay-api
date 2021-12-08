<?php

namespace Ibragimoff\CryptoPayApi\Model\CreateInvoice;

use Ibragimoff\CryptoPayApi\Client\Request\BaseHttpRequest;
use Ibragimoff\CryptoPayApi\Client\Response\ArrayResponseFactory;
use Ibragimoff\CryptoPayApi\Client\Response\HttpResponseFactoryInterface;

/**
 * CreateInvoiceRequest
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class CreateInvoiceRequest extends BaseHttpRequest
{
    private string $asset;
    private string $amount;
    private ?string $description;
    private ?string $paidBtnName;
    private ?string $paidBtnUrl;
    private ?string $payload;
    private ?bool $allowComments;
    private ?bool $allowAnonymous;

    public function __construct(
        string $asset,
        string $amount,
        ?string $description = null,
        ?string $paidBtnName = null,
        ?string $paidBtnUrl = null,
        ?string $payload = null,
        ?bool $allowComments = null,
        ?bool $allowAnonymous = null
    ) {
        $this->asset = $asset;
        $this->amount = $amount;
        $this->description = $description;
        $this->paidBtnName = $paidBtnName;
        $this->paidBtnUrl = $paidBtnUrl;
        $this->payload = $payload;
        $this->allowComments = $allowComments;
        $this->allowAnonymous = $allowAnonymous;
    }


    public function getUrl(): string
    {
        return 'createInvoice';
    }

    public function getParameters(): array
    {
        return [
            'query' => array_diff(
                [
                    'asset' => $this->asset,
                    'amount' => $this->amount,
                    'description' => $this->description,
                    'paid_btn_name' => $this->paidBtnName,
                    'paid_btn_url' => $this->paidBtnUrl,
                    'payload' => $this->payload,
                    'allow_comments' => $this->allowComments,
                    'allow_anonymous' => $this->allowAnonymous
                ],
                [null]
            )
        ];
    }

    public function getResponseModelClass(): string
    {
        return InvoiceModel::class;
    }

    public function getAsset(): string
    {
        return $this->asset;
    }

    public function setAsset(string $asset): void
    {
        $this->asset = $asset;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getPaidBtnName(): ?string
    {
        return $this->paidBtnName;
    }

    public function setPaidBtnName(?string $paidBtnName): void
    {
        $this->paidBtnName = $paidBtnName;
    }

    public function getPaidBtnUrl(): ?string
    {
        return $this->paidBtnUrl;
    }

    public function setPaidBtnUrl(?string $paidBtnUrl): void
    {
        $this->paidBtnUrl = $paidBtnUrl;
    }

    public function getPayload(): ?string
    {
        return $this->payload;
    }

    public function setPayload(?string $payload): void
    {
        $this->payload = $payload;
    }

    public function getAllowComments(): ?bool
    {
        return $this->allowComments;
    }

    public function setAllowComments(?bool $allowComments): void
    {
        $this->allowComments = $allowComments;
    }

    public function getAllowAnonymous(): ?bool
    {
        return $this->allowAnonymous;
    }

    public function setAllowAnonymous(?bool $allowAnonymous): void
    {
        $this->allowAnonymous = $allowAnonymous;
    }
}