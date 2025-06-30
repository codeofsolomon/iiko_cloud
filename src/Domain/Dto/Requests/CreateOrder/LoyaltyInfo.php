<?php

namespace IikoApi\Domain\Dto\Requests\CreateOrder;

use IikoApi\Domain\Dto\Requests\BaseRequest;

class LoyaltyInfo extends BaseRequest
{
    /**
     * Coupon No. that has to be considered when calculating loyalty program.
     */
    protected ?string $coupon = null;

    /**
     * Information about applied manual conditions.
     *
     * @var string[]|null
     */
    protected ?array $applicableManualConditions = null;

    public function setCoupon(?string $coupon): void
    {
        $this->coupon = $coupon;
    }

    /**
     * @param  string[]|null  $applicableManualConditions
     */
    public function setApplicableManualConditions(?array $applicableManualConditions): void
    {
        $this->applicableManualConditions = $applicableManualConditions;
    }
}
