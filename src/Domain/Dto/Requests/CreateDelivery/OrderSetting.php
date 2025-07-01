<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateDelivery;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

class OrderSetting extends BaseRequest
{
    public function __construct(
        public ?int $transportToFrontTimeout = 8,
        public ?bool $checkStopList = null,
    ) {
        Assert::nullOrGreaterThanEq($transportToFrontTimeout, 0);
    }
}
