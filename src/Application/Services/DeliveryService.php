<?php

namespace IikoApi\Application\Services;

use IikoApi\Application\Contracts\Http\ApiClientInterface;
use IikoApi\Constants;
use IikoApi\Entity\Requests\CreateDelivery\Request;
use IikoApi\Entity\Responses\CreateDelivery\CreateDeliveryResponse;
use IikoApi\Infrastructure\Auth\TokenAuthenticator;

class DeliveryService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    public function createDelivery(Request $request): CreateDeliveryResponse
    {
        $response = $this->client->request(
            'POST',
            Constants::CREATE_DELIVERY_URL,
            $request->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return CreateDeliveryResponse::fromArray($response);
    }
}
