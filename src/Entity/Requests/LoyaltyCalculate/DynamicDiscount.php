<?php

namespace IikoApi\Entity\Requests\LoyaltyCalculate;

use IikoApi\Entity\Requests\BaseRequest;

class DynamicDiscount extends BaseRequest
{
    /**
     * Manual discount condition identifier.
     */
    protected string $manualConditionId;

    /**
     * Discount amount.
     */
    protected float $Sum;

    public function getManualConditionId(): string
    {
        return $this->manualConditionId;
    }

    public function setManualConditionId(string $manualConditionId): void
    {
        $this->manualConditionId = $manualConditionId;
    }

    public function getSum(): float
    {
        return $this->Sum;
    }

    public function setSum(float $Sum): void
    {
        $this->Sum = $Sum;
    }
}
