<?php

namespace IikoApi\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use IikoApi\Constants;
use IikoApi\Contracts\Http\ApiClientInterface;
use IikoApi\Domain\Exceptions\IIkoRequestException;
use IikoApi\Domain\Exceptions\UnsupportedHttpRequestType;
use Psr\Http\Message\ResponseInterface;

class GuzzleApiClient implements ApiClientInterface
{
    public function __construct(
        protected Client $client
    ) {}

    public function request(string $method, string $uri, array $params = [], array $headers = []): array
    {
        try {
            $options = ['headers' => $headers];
            if ($method === 'GET') {
                $options['query'] = $params;
            } else {
                $options['json'] = $params;
            }

            $response = $this->client->request($method, $uri, $options);
        } catch (GuzzleException|UnsupportedHttpRequestType $e) {
            throw new IIkoRequestException('Network or transport error: '.$e->getMessage(), 500);
        }

        return $this->handleResponse($response);
    }

    private function handleResponse(ResponseInterface $response): array
    {
        $statusCode = $response->getStatusCode();
        $json = json_decode($response->getBody()->getContents(), true);

        if ($statusCode >= 400) {
            $message = $json[Constants::ERROR_DESCRIPTION] ?? 'Unknown error';
            throw new IIkoRequestException($message, $statusCode);
        }

        return $json ?? [];
    }
}
