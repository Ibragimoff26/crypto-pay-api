<?php

namespace Ibragimoff\CryptoPayApi;

use ArrayObject;
use Ibragimoff\CryptoPayApi\Client\HttpClient;
use Ibragimoff\CryptoPayApi\Model\CreateInvoice\CreateInvoiceRequest;
use Ibragimoff\CryptoPayApi\Model\CreateInvoice\InvoiceModel;
use Ibragimoff\CryptoPayApi\Model\GetBalance\CurrencyBalanceModel;
use Ibragimoff\CryptoPayApi\Model\GetBalance\GetBalanceRequest;
use Ibragimoff\CryptoPayApi\Model\GetCurrencies\CurrencyModel;
use Ibragimoff\CryptoPayApi\Model\GetCurrencies\GetCurrenciesRequest;
use Ibragimoff\CryptoPayApi\Model\GetExchangeRate\ExchangeRateModel;
use Ibragimoff\CryptoPayApi\Model\GetExchangeRate\GetExchangeRateRequest;
use Ibragimoff\CryptoPayApi\Model\GetInvoices\GetInvoicesRequest;
use Ibragimoff\CryptoPayApi\Model\GetInvoices\InvoiceListModel;
use Ibragimoff\CryptoPayApi\Model\GetMe\GetMeRequest;
use Ibragimoff\CryptoPayApi\Model\GetMe\GetMeResponse;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * CryptoPayApi
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class CryptoPayApi
{
    private HttpClient $client;

    public function __construct(HttpClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return object|InvoiceModel
     * @throws Client\Exception\ResponseException
     * @throws TransportExceptionInterface
     */
    public function createInvoice(CreateInvoiceRequest $request): InvoiceModel
    {
        return $this->client->request($request);
    }

    /**
     * @return ArrayObject|CurrencyBalanceModel[]|object
     * @throws TransportExceptionInterface
     * @throws Client\Exception\ResponseException
     */
    public function getBalance(): ArrayObject
    {
        return $this->client->request(new GetBalanceRequest());
    }

    /**
     * @return object|CurrencyModel[]|ArrayObject
     * @throws Client\Exception\ResponseException
     * @throws TransportExceptionInterface
     */
    public function getCurrencies(): ArrayObject
    {
        return $this->client->request(new GetCurrenciesRequest());
    }

    /**
     * @return object|ExchangeRateModel[]|ArrayObject
     * @throws Client\Exception\ResponseException
     * @throws TransportExceptionInterface
     */
    public function getExchangeRate(): ArrayObject
    {
        return $this->client->request(new GetExchangeRateRequest());
    }

    /**
     * @return object|InvoiceListModel
     * @throws Client\Exception\ResponseException
     * @throws TransportExceptionInterface
     */
    public function getInvoices(GetInvoicesRequest $request = null): InvoiceListModel
    {
        return $this->client->request($request ?? new GetInvoicesRequest());
    }

    /**
     * @return object|GetMeResponse
     * @throws Client\Exception\ResponseException
     * @throws TransportExceptionInterface
     */
    public function getMe(): GetMeResponse
    {
        return $this->client->request(new GetMeRequest());
    }
}