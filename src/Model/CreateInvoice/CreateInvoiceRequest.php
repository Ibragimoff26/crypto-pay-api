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
    public const PAID_BTN_VIEW_ITEM = 'viewItem';
    public const PAID_BTN_OPEN_CHANNEL = 'openChannel';
    public const PAID_BTN_OPEN_BOT = 'openBot';
    public const PAID_BTN_CALLBACK = 'callback';

    private string $asset;
    private string $amount;
    private ?string $description;
    private ?string $hiddenMessage;
    private ?string $paidBtnName;
    private ?string $paidBtnUrl;
    private ?string $payload;
    private ?bool $allowComments;
    private ?bool $allowAnonymous;
    private ?int $expiriesIn;

    public function __construct(
        string $asset,
        string $amount,
        ?string $description = null,
        ?string $hiddenMessage = null,
        ?string $paidBtnName = null,
        ?string $paidBtnUrl = null,
        ?string $payload = null,
        ?bool $allowComments = null,
        ?bool $allowAnonymous = null,
        ?int $expiriesIn = null
    ) {
        $this->asset = $asset;
        $this->amount = $amount;
        $this->description = $description;
        $this->paidBtnName = $paidBtnName;
        $this->paidBtnUrl = $paidBtnUrl;
        $this->payload = $payload;
        $this->allowComments = $allowComments;
        $this->allowAnonymous = $allowAnonymous;
        $this->hiddenMessage = $hiddenMessage;
        $this->expiriesIn = $expiriesIn;
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
                    'hidden_message' => $this->hiddenMessage,
                    'paid_btn_name' => $this->paidBtnName,
                    'paid_btn_url' => $this->paidBtnUrl,
                    'payload' => $this->payload,
                    'allow_comments' => $this->allowComments,
                    'allow_anonymous' => $this->allowAnonymous,
                    'expires_in' => $this->expiriesIn
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

    public function setAsset(string $asset): CreateInvoiceRequest
    {
        $this->asset = $asset;
        return $this;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): CreateInvoiceRequest
    {
        $this->amount = $amount;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): CreateInvoiceRequest
    {
        $this->description = $description;
        return $this;
    }

    public function getHiddenMessage(): ?string
    {
        return $this->hiddenMessage;
    }

    public function setHiddenMessage(?string $hiddenMessage): CreateInvoiceRequest
    {
        $this->hiddenMessage = $hiddenMessage;
        return $this;
    }

    public function getPaidBtnName(): ?string
    {
        return $this->paidBtnName;
    }

    public function setPaidBtnName(?string $paidBtnName): CreateInvoiceRequest
    {
        $this->paidBtnName = $paidBtnName;
        return $this;
    }

    public function getPaidBtnUrl(): ?string
    {
        return $this->paidBtnUrl;
    }

    public function setPaidBtnUrl(?string $paidBtnUrl): CreateInvoiceRequest
    {
        $this->paidBtnUrl = $paidBtnUrl;
        return $this;
    }

    public function getPayload(): ?string
    {
        return $this->payload;
    }

    public function setPayload(?string $payload): CreateInvoiceRequest
    {
        $this->payload = $payload;
        return $this;
    }

    public function getAllowComments(): ?bool
    {
        return $this->allowComments;
    }

    public function setAllowComments(?bool $allowComments): CreateInvoiceRequest
    {
        $this->allowComments = $allowComments;
        return $this;
    }

    public function getAllowAnonymous(): ?bool
    {
        return $this->allowAnonymous;
    }

    public function setAllowAnonymous(?bool $allowAnonymous): CreateInvoiceRequest
    {
        $this->allowAnonymous = $allowAnonymous;
        return $this;
    }

    public function getExpiriesIn(): ?int
    {
        return $this->expiriesIn;
    }

    public function setExpiriesIn(?int $expiriesIn): CreateInvoiceRequest
    {
        $this->expiriesIn = $expiriesIn;
        return $this;
    }
}