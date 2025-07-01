<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateDelivery;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

class Request extends BaseRequest
{
    public function __construct(
        public string $organizationId,   // UUID
        public Order $order,
        public ?string $terminalGroupId = null, // UUID TG
        public ?OrderSetting $createOrderSettings = null,
    ) {
        Assert::uuid($organizationId, 'organizationId должен быть UUID.');
        Assert::nullOrUuid($terminalGroupId);
    }
}
