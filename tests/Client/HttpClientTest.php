<?php

namespace Ibragimoff\CryptoPayApi\Tests\Client;

use Ibragimoff\CryptoPayApi\Client\Exception\ResponseException;
use Ibragimoff\CryptoPayApi\Client\HttpClient;
use Ibragimoff\CryptoPayApi\Model\GetBalance\GetBalanceRequest;
use Ibragimoff\CryptoPayApi\Model\GetMe\GetMeRequest;
use Ibragimoff\CryptoPayApi\Model\GetMe\GetMeResponse;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * HttpClientTest
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class HttpClientTest extends TestCase
{
    private const API_URL  = 'https://testnet-pay.crypt.bot/';
    private const API_KEY = '3475:AAGb2hbFYhm9kI501T8NcTLrYCJJFlOhAF7';

    private static HttpClient|null $client = null;

    public static function createClient(): HttpClient
    {
        return new HttpClient(
            self::API_URL,
            self::API_KEY,
            new CurlHttpClient()
        );
    }

    protected function setUp(): void
    {
        self::$client = self::createClient();
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ResponseException
     */
    public function testGetMeRequest(): void
    {
        $response = self::$client->request(
            new GetMeRequest()
        );

        $this->assertInstanceOf(GetMeResponse::class, $response);
    }
}