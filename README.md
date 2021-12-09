# ibragimoff26/crypto-pay-api
**[Crypto Pay](http://t.me/CryptoBot/?start=pay)** is a payment system based on [@CryptoBot](http://t.me/CryptoBot), which allows you to accept payments in cryptocurrency using the API.
This library help you to work with **Crypto Pay** via [Crypto Pay API](https://telegra.ph/Crypto-Pay-API-11-25).

## Install
```shell
composer require ibragimoff26/crypto-pay-api
```

## Usage

Just create an instance of **CryptoPayApi**
```injectablephp
$httpClient = new \Ibragimoff\CryptoPayApi\Client\HttpClient(
    'API_HOST_NAME', // https://pay.crypt.bot/ for mainnet and https://testnet-pay.crypt.bot/ for testnet
    'YOUR_API_KEY',
    new \Symfony\Component\HttpClient\CurlHttpClient()
);

$api = new \Ibragimoff\CryptoPayApi\CryptoPayApi($httpClient);

$me = $api->getMe();

$balance = $api->getBalance();

$currencies = $api->getCurrencies();

$exchangeRate = $api->getExchangeRate();

$invoices = $api->getInvoices(
    new \Ibragimoff\CryptoPayApi\Model\GetInvoices\GetInvoicesRequest(
        asset: "TON"
    )
);

$newInvoice = $api->createInvoice(
    new \Ibragimoff\CryptoPayApi\Model\CreateInvoice\CreateInvoiceRequest(
        asset: "TON",
        amount: "0.01" 
    )
);
```