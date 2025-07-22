<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Domain\Dto\Requests\CreateDelivery\CancelRequest;
use IikoApi\Domain\Dto\Requests\CreateDelivery\Request;
use IikoApi\Domain\Dto\Responses\CreateDelivery\CreateDeliveryResponse;

final class DeliveryService extends BaseService
{
    public function createDelivery(Request $request): CreateDeliveryResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::CREATE_DELIVERY_URL,
            $request->toArray(),
        );

        return CreateDeliveryResponse::fromArray($response);
    }

    public function cancelDelivery(CancelRequest $request): ?string
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::CANCEL_DELIVERY_URL,
            $request->toArray(),
        );

        return $response['correlationId'];
    }
}
