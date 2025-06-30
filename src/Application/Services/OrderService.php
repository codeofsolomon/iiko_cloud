<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Domain\Dto\Requests\CreateDelivery\Request;
use IikoApi\Domain\Dto\Responses\Order\OrderResponse;

final class OrderService extends BaseService
{
    /**
     * Summary of createOrder
     */
    public function createOrder(Request $request): OrderResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::CREATE_ORDER_URL,
            $request->toArray(),
        );

        return OrderResponse::fromArray($response);
    }
}
