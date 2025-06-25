<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;
use IikoApi\Entity\Requests\CreateDelivery\Request;
use IikoApi\Entity\Responses\CreateDelivery\CreateDeliveryResponse;

class DeliveryService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}



    public function createDelivery(Request $request): CreateDeliveryResponse
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::CREATE_DELIVERY_URL,
            $request->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return CreateDeliveryResponse::fromArray($response);
    }

}