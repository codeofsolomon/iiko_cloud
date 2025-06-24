<?php

namespace Src\Entity\Requests\CreateOrder\DiscountsInfo;

use IikoApi\Entity\Requests\BaseRequest;


class DiscountRMS extends BaseRequest
{
    protected string $type = 'RMS';

    /**
     * Discount type.
     *
     * - Can be obtained by /api/1/discounts operation.
     */
    protected string $discountTypeId;

    /**
     * Discount/surcharge sum.
     */
    protected ?float $sum = null;

    /**
     * Discount information for order items.
     *
     * @var string[]|null
     */
    protected ?array $selectivePositions = null;

    public function __construct(string $discountTypeId)
    {
        $this->discountTypeId = $discountTypeId;
    }

    public function getDiscountTypeId(): string
    {
        return $this->discountTypeId;
    }

    public function setDiscountTypeId(string $discountTypeId): void
    {
        $this->discountTypeId = $discountTypeId;
    }

    public function getSum(): ?float
    {
        return $this->sum;
    }

    public function setSum(?float $sum): void
    {
        $this->sum = $sum;
    }

    /**
     * @return string[]|null
     */
    public function getSelectivePositions(): ?array
    {
        return $this->selectivePositions;
    }

    /**
     * @param string[]|null $selectivePositions
     */
    public function setSelectivePositions(?array $selectivePositions): void
    {
        $this->selectivePositions = $selectivePositions;
    }

    public function addSelectivePosition(string $position): void
    {
        if (!is_array($this->selectivePositions)) {
            $this->selectivePositions = [];
        }

        $this->selectivePositions[] = $position;
    }
}