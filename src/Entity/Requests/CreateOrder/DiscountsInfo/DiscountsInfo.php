<?php

namespace IikoApi\Entity\Requests\CreateOrder\DiscountsInfo;

use IikoApi\Entity\Requests\BaseRequest;

class DiscountsInfo extends BaseRequest
{
    /**
     * Track of discount card to be applied to order.
     */
    protected ?DiscountCard $card = null;

    /**
     * Discounts/surcharges.
     *
     * @var (DiscountIikoCard|DiscountRMS)[]
     */
    protected ?array $discounts = null;


    protected ?bool $fixedLoyaltyDiscounts = null;


    /**
     * Track of discount card to be applied to order.
     */
    public function setCard(?DiscountCard $card): void
    {
        $this->card = $card;
    }

    /**
     * Discounts/surcharges.
     *
     * @param (DiscountIikoCard|DiscountRMS)[] $discounts
     */
    public function setDiscounts(?array $discounts): void
    {
        $this->discounts = $discounts;
    }

    public function setFixedLoyaltyDiscounts(?bool $fixedLoyaltyDiscounts): void
    {
        $this->fixedLoyaltyDiscounts = $fixedLoyaltyDiscounts;
    }
}