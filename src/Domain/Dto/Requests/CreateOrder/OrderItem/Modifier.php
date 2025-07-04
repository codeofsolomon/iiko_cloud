<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\OrderItem;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

class Modifier extends BaseRequest
{
    public function __construct(
        public string $productId,          // UUID
        public float $amount,             // >0
        public ?string $productGroupId = null,
        public ?float $price = null,
        public ?string $positionId = null, // UUID or null → auto-gen
    ) {
        Assert::uuid($productId);
        Assert::greaterThan($amount, 0);
        Assert::nullOrUuid($productGroupId);
        Assert::nullOrGreaterThanEq($price, 0);
        Assert::nullOrUuid($positionId);
    }
}
