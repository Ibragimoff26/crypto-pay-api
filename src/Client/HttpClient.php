<?php

namespace Ibragimoff\CryptoPayApi\Client;

use ArrayObject;
use Doctrine\Common\Annotations\AnnotationReader;
use Exception;
use Ibragimoff\CryptoPayApi\Client\Exception\ResponseException;
use Ibragimoff\CryptoPayApi\Client\Request\HttpClientRequestInterface;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * HttpClient
 * @author Shapi Ibragimov <ibragimych26@gmail.com>
 */
final class HttpClient
{
    private string $apiUrl;
    private string $apiKey;
    private HttpClientInterface $client;
    private SerializerInterface $serializer;

    public function __construct(
        string $apiUrl,
        string $apiKey,
        HttpClientInterface $client,
        SerializerInterface $serializer = null
    )
    {
        $this->apiUrl = $apiUrl;
        $this->apiKey = $apiKey;
        $this->client = $client;
        $this->serializer = $serializer ?? $this->createSerializer();
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ResponseException
     */
    public function request(HttpClientRequestInterface $request, array $context = []): object
    {
        try {
            return $this->createResponse(
                $request,
                $context,
                $this->client->request(
                    $request->getMethod(),
                    $this->apiUrl . 'api/' . $request->getUrl(),
                    array_merge_recursive(
                        [
                            'headers' => [
                                'Crypto-Pay-API-Token' => $this->apiKey
                            ]
                        ],
                        $request->getParameters()
                    )
                )
            );
        } catch (ClientExceptionInterface $e) {
            throw $this->createException($e->getResponse(), $e);
        }
    }

    private function createResponse(HttpClientRequestInterface $request, array $context, ResponseInterface $symfonyHttpClientResponse): object
    {
        $responseArray = $symfonyHttpClientResponse->toArray();

        if ($responseArray['ok'] !== true) {
            throw new $this->createException($symfonyHttpClientResponse);
        }

        if ($request->getResponseModelFactory() !== null) {
            return $request->getResponseModelFactory()->createModel($responseArray['result'], $context);
        }

        return $this->denormalize(
            $responseArray['result'],
            $request->getResponseModelClass()
        );
    }

    private function denormalize(array $content, string $modelClass): object
    {
        if ($this->serializer instanceof Serializer) {
            $deserializedData = $this->serializer->denormalize($content, $modelClass);
        } else {
            $deserializedData = $this->serializer->deserialize(json_encode($content), $modelClass, 'json');
        }

        if (is_array($deserializedData)) {
            $deserializedData = new ArrayObject($deserializedData);
        }

        return $deserializedData;
    }

    private function createException(ResponseInterface $response, Exception $prev): ResponseException
    {
        $responseArray = $response->toArray(false);

        if (isset($responseArray['error'])) {
            return new ResponseException(
                $responseArray['error']['name'],
                $responseArray['error'],
                $prev
            );
        }

        return new ResponseException('При отправке запроса возникла ошибка', ['dbg' => $response->getInfo('debug')], $prev);
    }

    private function createSerializer(): Serializer
    {
        return new Serializer(
            [
                new ArrayDenormalizer(),
                new ObjectNormalizer(
                    nameConverter: new CamelCaseToSnakeCaseNameConverter(),
                    propertyTypeExtractor: new ReflectionExtractor()
                ),
                new DateTimeNormalizer()
            ]
        );
    }
}