<?php

namespace Ibragimoff\CryptoPayApi\Model\GetInvoices;

use Ibragimoff\CryptoPayApi\Model\CreateInvoice\InvoiceModel;

/**
 * InvoiceListModel
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class InvoiceListModel
{
    private array $items = [];

    public function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }

    public function addItem(InvoiceModel $invoiceModel): self
    {
        $this->items[] = $invoiceModel;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}