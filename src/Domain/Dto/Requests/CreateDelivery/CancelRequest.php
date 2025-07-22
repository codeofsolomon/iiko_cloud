<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateDelivery;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

class CancelRequest extends BaseRequest
{
    public function __construct(
        public string $organizationId,   // UUID
        public string $orderId,// UUID

    ) {
        Assert::uuid($organizationId, 'organizationId должен быть UUID.');
        Assert::uuid($orderId, 'orderId должен быть UUID.');

    }
}
