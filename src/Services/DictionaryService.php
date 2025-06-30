<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\Http\ApiClientInterface;
use IikoApi\Entity\Requests\Dictionary\DiscountsRequest;
use IikoApi\Entity\Requests\Dictionary\OrderTypesRequest;
use IikoApi\Entity\Requests\Dictionary\PaymentTypesRequest;
use IikoApi\Entity\Responses\Dictionary\Discount;
use IikoApi\Entity\Responses\Dictionary\OrderTypes;
use IikoApi\Entity\Responses\Dictionary\PaymentTypes;
use IikoApi\Infrastructure\Auth\TokenAuthenticator;

class DictionaryService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    /**
     * Summary of getPaymentTypes
     */
    public function getPaymentTypes(PaymentTypesRequest $filter): PaymentTypes
    {
        $response = $this->client->request(
            'POST',
            Constants::PAYMENT_TYPES_URL,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return PaymentTypes::fromArray($response);
    }

    /**
     * Summary of getOrderTypes
     */
    public function getOrderTypes(OrderTypesRequest $filter): OrderTypes
    {
        $response = $this->client->request(
            'POST',
            Constants::ORDER_TYPES,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return OrderTypes::fromArray($response);
    }

    /**
     * Summary of getDiscounts
     */
    public function getDiscounts(DiscountsRequest $filter): Discount
    {
        $response = $this->client->request(
            'POST',
            Constants::DISCOUNTS_URL,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return Discount::fromArray($response);
    }
}
