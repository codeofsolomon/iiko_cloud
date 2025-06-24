<?php

namespace Src\Entity\Requests\CreateOrder\DiscountsInfo;

use IikoApi\Entity\Requests\BaseRequest;


class DiscountItem extends BaseRequest
{
    /**
     * Position ID of order item.
     */
    protected string $positionId;

    /**
     * Discount/surcharge sum.
     */
    protected float $sum;

    /**
     * Amount.
     */
    protected float $amount;

    public function __construct(string $positionId, float $sum, float $amount)
    {
        $this->positionId = $positionId;
        $this->sum = $sum;
        $this->amount = $amount;
    }

    public function setPositionId(string $positionId): void
    {
        $this->positionId = $positionId;
    }

    public function setSum(float $sum): void
    {
        $this->sum = $sum;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }
}