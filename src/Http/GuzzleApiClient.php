<?php

namespace IikoApi\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use IikoApi\Constants;
use IikoApi\Contracts\Http\ApiClientInterface;
use IikoApi\Domain\Exceptions as Ex;
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
        } catch (GuzzleException $e) {
            throw new Ex\ServerException('Network or transport error: '.$e->getMessage(), 500);
        }

        return $this->handleResponse($response);
    }

    private function handleResponse(ResponseInterface $response): array
    {
        $status = $response->getStatusCode();
        $json = json_decode($response->getBody()->getContents(), true);

        if ($status >= 200 && $status < 300) {
            return $json ?? [];
        }

        $errMsg = $json[Constants::ERROR_DESCRIPTION] ?? 'Unknown error';

        return match (true) {
            $status === 400 => throw new Ex\BadRequestException($errMsg, $status),
            $status === 401 => throw new Ex\UnauthorizedException($errMsg, $status),
            $status === 403 => throw new Ex\ForbiddenException($errMsg, $status),
            $status === 408 => throw new Ex\RequestTimeoutException($errMsg, $status),
            $status === 404 => throw new Ex\NotFoundException($errMsg, $status),
            $status === 429 => throw new Ex\TooManyRequestsException($errMsg, $status),
            $status >= 500 => throw new Ex\ServerException($errMsg, $status),
            default => throw new Ex\UnexpectedResponseException($errMsg, $status),
        };

    }
}
