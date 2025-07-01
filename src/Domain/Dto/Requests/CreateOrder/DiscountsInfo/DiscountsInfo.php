<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\DiscountsInfo;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

/* ------------------------------------------------------------------
 | 5. Итоговый объект DiscountsInfo
 * ----------------------------------------------------------------- */
class DiscountsInfo extends BaseRequest
{
    /**
     * @param  array<DiscountIikoCard|DiscountRms>|null  $discounts
     */
    public function __construct(
        public ?DiscountCard $card = null,
        public ?array $discounts = null,
        public ?bool $fixedLoyaltyDiscounts = null,
    ) {
        Assert::nullOrAllIsInstanceOfAny(
            $discounts,
            [DiscountIikoCard::class, DiscountRms::class],
            'discounts могут содержать только DiscountIikoCard или DiscountRms'
        );
    }
}
