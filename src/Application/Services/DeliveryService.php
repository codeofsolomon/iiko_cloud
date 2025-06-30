<?php

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Entity\Requests\CreateDelivery\Request;
use IikoApi\Entity\Responses\CreateDelivery\CreateDeliveryResponse;

final class DeliveryService extends BaseService
{
    public function createDelivery(Request $request): CreateDeliveryResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::CREATE_DELIVERY_URL,
            $request->prepareRequest(),
        );

        return CreateDeliveryResponse::fromArray($response);
    }
}
