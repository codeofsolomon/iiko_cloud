<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

/* ------------------------------------------------------------------
 | 1. LoyaltyInfo
 * ----------------------------------------------------------------- */
class LoyaltyInfo extends BaseRequest
{
    /**
     * @param  string|null  $coupon  купон (номер/код)
     * @param  string[]|null  $applicableManualConditions  активированные manual-условия
     */
    public function __construct(
        public ?string $coupon = null,
        public ?array $applicableManualConditions = null,
    ) {
        Assert::nullOrStringNotEmpty($coupon);
        Assert::nullOrAllStringNotEmpty($applicableManualConditions);
    }
}
