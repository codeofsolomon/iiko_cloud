<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;
use Src\Entity\Requests\Dictionary\DiscountsRequest;
use Src\Entity\Requests\Dictionary\OrderTypesRequest;
use Src\Entity\Requests\Dictionary\PaymentTypesRequest;
use Src\Entity\Responses\Dictionary\Discount;
use Src\Entity\Responses\Dictionary\OrderTypes;
use Src\Entity\Responses\Dictionary\PaymentTypes;

class DictionaryService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}


    /**
     * Summary of getPaymentTypes
     * @param \Src\Entity\Requests\Dictionary\PaymentTypesRequest $filter
     * @return PaymentTypes
     */
    public function getPaymentTypes(PaymentTypesRequest $filter): PaymentTypes
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::PAYMENT_TYPES_URL,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return PaymentTypes::fromArray($response);
    }


    /**
     * Summary of getOrderTypes
     * @param \Src\Entity\Requests\Dictionary\OrderTypesRequest $filter
     * @return OrderTypes
     */
    public function getOrderTypes(OrderTypesRequest $filter): OrderTypes
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::ORDER_TYPES,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return OrderTypes::fromArray($response);
    }

    /**
     * Summary of getDiscounts
     * @param \Src\Entity\Requests\Dictionary\DiscountsRequest $filter
     * @return Discount
     */
    public function getDiscounts(DiscountsRequest $filter): Discount
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::DISCOUNTS_URL,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return Discount::fromArray($response);
    }

}