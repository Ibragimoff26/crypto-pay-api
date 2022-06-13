<?php
namespace Ibragimoff\CryptoPayApi\Tests;

use Ibragimoff\CryptoPayApi\Client\Exception\ResponseException;
use Ibragimoff\CryptoPayApi\Client\HttpClient;
use Ibragimoff\CryptoPayApi\CryptoPayApi;
use Ibragimoff\CryptoPayApi\Model\CreateInvoice\CreateInvoiceRequest;
use Ibragimoff\CryptoPayApi\Model\GetExchangeRate\ExchangeRateModel;
use Ibragimoff\CryptoPayApi\Tests\Client\HttpClientTest;
use PHPUnit\Framework\TestCase;

/**
 * CryptoPayApiTest
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class CryptoPayApiTest extends TestCase
{
    private static CryptoPayApi|null $api = null;

    protected function setUp(): void
    {
        $client = HttpClientTest::createClient();
        self::$api = new CryptoPayApi($client);
    }

    public function testGetMe(): void
    {
        $response = self::$api->getMe();

        $this->assertGreaterThan(0, $response->getAppId());
        $this->assertNotEmpty($response->getName());
        $this->assertNotEmpty($response->getPaymentProcessingBotUsername());
    }

    public function testGetInvoices(): void
    {
        $response = self::$api->getInvoices();
        $this->assertIsArray($response->getItems());
    }

    public function testGetExchangeRate(): void
    {
        $response = self::$api->getExchangeRate();

        /** @var ExchangeRateModel $rate */
        foreach ($response as $rate) {
            $this->assertIsBool($rate->isValid());
            $this->assertNotEmpty($rate->getSource());
            $this->assertNotEmpty($rate->getTarget());
            $this->assertNotEmpty($rate->getRate());
        }
    }

    public function testGetCurrencies(): void
    {
        $response = self::$api->getCurrencies();

        foreach ($response as $currency) {
            $this->assertIsBool($currency->isBlockchain());
            $this->assertIsBool($currency->isStablecoin());
            $this->assertIsBool($currency->isFiat());
            $this->assertNotEmpty($currency->getName());
            $this->assertNotEmpty($currency->getCode());
            $this->greaterThan(0, $currency->getDecimals());
        }
    }

    public function testGetBalance(): void
    {
        $response = self::$api->getBalance();

        foreach ($response as $key => $balance) {
            $this->assertNotEmpty($balance->getCurrencyCode());
            $this->assertIsString($balance->getAvailable());
        }
    }

    public function testCreateInvoiceFailed(): void
    {
        $this->expectException(ResponseException::class);
        $response = self::$api->createInvoice(new CreateInvoiceRequest("TON", "0.000001"));
    }

    public function testCreateInvoice()
    {
        $asset = "TON";
        $amount = "0.1";
        $description = 'Test Invoice';
        $paidBtnName = 'Test Invoice Btn';
        $paidBtnUrl = 'https://ton.org/';
        $payload = 'test payload';
        $allowComments = true;
        $allowAnonymous = true;

        $response = self::$api->createInvoice(
            new CreateInvoiceRequest(
                $asset,
                $amount,
                $description,
                payload: $payload,
                allowComments: $allowComments,
                allowAnonymous: $allowAnonymous,
                expiriesIn: 100
            )
        );

        $this->assertEquals($asset, $response->getAsset());
        $this->assertEquals($amount, $response->getAmount());
    }
}