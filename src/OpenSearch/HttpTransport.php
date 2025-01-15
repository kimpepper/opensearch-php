<?php

namespace OpenSearch;

use OpenSearch\Exception\HttpExceptionFactory;
use OpenSearch\Serializers\SerializerInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Transport that uses PSR-7, PSR-17 and PSR-18 interfaces.
 */
final class HttpTransport implements TransportInterface
{
    public function __construct(
        protected ClientInterface $client,
        protected RequestFactoryInterface $requestFactory,
        protected SerializerInterface $serializer,
        protected HttpExceptionFactory $httpExceptionFactory,
    ) {
    }

    /**
     * Create a new request.
     */
    public function createRequest(string $method, string $uri, array $params = [], mixed $body = null, array $headers = []): RequestInterface
    {
        return $this->requestFactory->createRequest($method, $uri, $params, $body, $headers);
    }

    /**
     * {@inheritdoc}
     */
    public function sendRequest(
        string $method,
        string $uri,
        array $params = [],
        mixed $body = null,
        array $headers = [],
    ): array|string|null {
        $request = $this->createRequest($method, $uri, $params, $body, $headers);
        $response = $this->client->sendRequest($request);
        $statusCode = $response->getStatusCode();
        $responseBody = $response->getBody()->getContents();
        $responseHeaders = $response->getHeaders();
        if ($statusCode >= 400) {
            // Throw an HTTP exception.
            throw $this->httpExceptionFactory->create($statusCode, $responseBody, $responseHeaders);
        }
        return $this->serializer->deserialize($responseBody, $responseHeaders);
    }

}
