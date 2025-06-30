<?php

namespace IikoApi\Application\Services;

use IikoApi\Application\Contracts\Http\ApiClientInterface;
use IikoApi\Constants;
use IikoApi\Entity\Requests\CreateDelivery\Request;
use IikoApi\Entity\Responses\Order\OrderResponse;
use IikoApi\Infrastructure\Auth\TokenAuthenticator;

class OrderService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    /**
     * Summary of createOrder
     */
    public function createOrder(Request $request): OrderResponse
    {
        $response = $this->client->request(
            'POST',
            Constants::CREATE_ORDER_URL,
            $request->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return OrderResponse::fromArray($response);
    }
}
