<?php

namespace Ibragimoff\CryptoPayApi\Model\GetInvoices;

use Ibragimoff\CryptoPayApi\Client\Request\BaseHttpRequest;
use Ibragimoff\CryptoPayApi\Client\Response\ArrayResponseFactory;
use Ibragimoff\CryptoPayApi\Client\Response\HttpResponseFactoryInterface;
use JetBrains\PhpStorm\ArrayShape;

/**
 * GetInvoicesRequest
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class GetInvoicesRequest extends BaseHttpRequest
{
    private ?string $asset = null;
    private ?array $invoiceIds = null;
    private ?string $status = null;
    private ?int $offset = null;
    private ?int $count = null;

    public function getParameters(): array
    {
        return [
            'query' => array_diff(
                [
                    'asset' => $this->asset,
                    'invoice_ids' => $this->invoiceIds ? implode(',', $this->invoiceIds) : null,
                    'status' => $this->status,
                    'offset' => $this->offset,
                    'count' => $this->count
                ],
                [null]
            )
        ];
    }

    public function getResponseModelClass(): string
    {
        return InvoiceListModel::class;
    }

    public function getAsset(): ?string
    {
        return $this->asset;
    }

    public function setAsset(?string $asset): void
    {
        $this->asset = $asset;
    }

    public function getInvoiceIds(): ?array
    {
        return $this->invoiceIds;
    }

    public function setInvoiceIds(?array $invoiceIds): void
    {
        $this->invoiceIds = $invoiceIds;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function setOffset(?int $offset): void
    {
        $this->offset = $offset;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(?int $count): void
    {
        $this->count = $count;
    }

    public function getUrl(): string
    {
        return 'getInvoices';
    }
}