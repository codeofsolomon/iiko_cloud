<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;
use IikoApi\Entity\Requests\CreateDelivery\Request;
use IikoApi\Entity\Responses\Order\OrderResponse;

class OrderService
{
     public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}


    /**
     * Summary of createOrder
     * @param \IikoApi\Entity\Requests\CreateDelivery\Request $request
     * @return OrderResponse
     */
    public function createOrder(Request $request): OrderResponse
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::CREATE_ORDER_URL,
            $request->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return OrderResponse::fromArray($response);
    }
}