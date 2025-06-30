<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use GuzzleHttp\Psr7\Utils;
use IikoApi\Application\Contracts\Auth\AuthenticatorInterface;
use IikoApi\Application\Contracts\Http\ApiClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

abstract class BaseService
{
    public function __construct(
        protected readonly ApiClientInterface $api,
        protected readonly AuthenticatorInterface $auth,
        protected readonly RequestFactoryInterface $requestFactory,
    ) {}

    final protected function authorizedRequest(
        string $method,
        string $uri,
        array $options = []
    ): mixed {
        $request = $this->requestFactory->createRequest($method, $uri)
            ->withHeader('Authorization', 'Bearer '.$this->auth->token());

        if ($method !== 'GET') {
            $request->withHeader('Content-Type', 'application/json')
                ->withBody(Utils::streamFor(json_encode($options ?? [], JSON_THROW_ON_ERROR)));
        } else {
            foreach ($options ?? [] as $key => $value) {
                $request = $request->withUri(
                    $request->getUri()->withQuery(http_build_query([$key => $value]))
                );
            }
        }

        $response = $this->api->send($request);

        return json_decode((string) $response->getBody(), true);
    }
}
