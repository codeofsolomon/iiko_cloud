<?php

namespace Src\Entity\Requests\CreateOrder\DiscountsInfo;

use IikoApi\Entity\Requests\BaseRequest;

class DiscountIikoCard extends BaseRequest
{
    protected string $type = 'iikoCard';

    /**
     * Card program ID.
     */
    protected string $programId;

    /**
     * Card program name.
     */
    protected string $programName;

    /**
     * Discount information for order items.
     *
     * @var DiscountItem[]
     */
    protected array $discountItems = [];

    public function __construct(string $programId, string $programName)
    {
        $this->programId = $programId;
        $this->programName = $programName;
    }

    public function setProgramId(string $programId): void
    {
        $this->programId = $programId;
    }

    public function setProgramName(string $programName): void
    {
        $this->programName = $programName;
    }

    public function setDiscountItems(array $discountItems): void
    {
        $this->discountItems = $discountItems;
    }

    public function addDiscountItem(DiscountItem $discountItem): void
    {
        $this->discountItems[] = $discountItem;
    }
}