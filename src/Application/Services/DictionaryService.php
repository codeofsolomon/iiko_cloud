<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Domain\Dto\Requests\Dictionary\DiscountsRequest;
use IikoApi\Domain\Dto\Requests\Dictionary\OrderTypesRequest;
use IikoApi\Domain\Dto\Requests\Dictionary\PaymentTypesRequest;
use IikoApi\Domain\Dto\Responses\Dictionary\DiscountResponse;
use IikoApi\Domain\Dto\Responses\Dictionary\OrderTypes;
use IikoApi\Domain\Dto\Responses\Dictionary\PaymentTypes;

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
            $filter->toArray(),
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
            $filter->toArray(),
        );

        return OrderTypes::fromArray($response);
    }

    /**
     * Summary of getDiscounts
     */
    public function getDiscounts(DiscountsRequest $filter): DiscountResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::DISCOUNTS_URL,
            $filter->toArray(),
        );

        return DiscountResponse::fromArray($response);
    }
}
