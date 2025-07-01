<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\LoyaltyCalculate;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

class DynamicDiscount extends BaseRequest
{
    public function __construct(
        public string $manualConditionId,   // UUID manual-условия
        public float $sum                  // ≥ 0
    ) {
        Assert::uuid($manualConditionId);
        Assert::greaterThanEq($sum, 0);
    }
}
