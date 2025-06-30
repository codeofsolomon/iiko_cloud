<?php

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Entity\Requests\Dictionary\DiscountsRequest;
use IikoApi\Entity\Requests\Dictionary\OrderTypesRequest;
use IikoApi\Entity\Requests\Dictionary\PaymentTypesRequest;
use IikoApi\Entity\Responses\Dictionary\Discount;
use IikoApi\Entity\Responses\Dictionary\OrderTypes;
use IikoApi\Entity\Responses\Dictionary\PaymentTypes;

final class DictionaryService extends BaseService
{
    /**
     * Summary of getPaymentTypes
     */
    public function getPaymentTypes(PaymentTypesRequest $filter): PaymentTypes
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::PAYMENT_TYPES_URL,
            $filter->prepareRequest(),
        );

        return PaymentTypes::fromArray($response);
    }

    /**
     * Summary of getOrderTypes
     */
    public function getOrderTypes(OrderTypesRequest $filter): OrderTypes
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::ORDER_TYPES,
            $filter->prepareRequest(),
        );

        return OrderTypes::fromArray($response);
    }

    /**
     * Summary of getDiscounts
     */
    public function getDiscounts(DiscountsRequest $filter): Discount
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::DISCOUNTS_URL,
            $filter->prepareRequest(),
        );

        return Discount::fromArray($response);
    }
}
