<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Entity\Requests\CreateDelivery\Request;
use IikoApi\Entity\Responses\Order\OrderResponse;

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
            $request->prepareRequest(),
        );

        return OrderResponse::fromArray($response);
    }
}
