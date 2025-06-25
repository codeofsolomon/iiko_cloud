<?php

namespace IikoApi\Entity\Requests\CreateOrder\OrderItem;

use IikoApi\Entity\Requests\BaseRequest;

class Modifier extends BaseRequest
{
    /**
     * Modifier item ID.
     *
     * - Can be obtained by /api/1/nomenclature operation.
     */
    protected string $productId;

    /**
     * Quantity.
     */
    protected float $amount;

    /**
     * Modifiers group ID (for group modifier). Required for a group modifier.
     *
     * - Can be obtained by /api/1/nomenclature operation.
     */
    protected ?string $productGroupId = null;

    /**
     * Unit price.
     */
    protected ?float $price = null;

    /**
     * Unique identifier of the item in the order. MUST be unique for the whole system. Therefore it must be generated with Guid.NewGuid().
     *
     * - If sent null, it generates automatically on iikoTransport side.
     */
    protected ?string $positionId = null;

    public function __construct(
        string $productId, 
        float $amount,
        ?string $productGroupId = null,
        ?float $price = null,
        ?string $positionId = null
    )
    {
        $this->productId = $productId;
        $this->amount = $amount;
        $this->productGroupId = $productGroupId;
        $this->price = $price;
        $this->positionId = $positionId;
    }

    public function setProductId(string $productId): void
    {
        $this->productId = $productId;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function setProductGroupId(?string $productGroupId): void
    {
        $this->productGroupId = $productGroupId;
    }

    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }

    public function setPositionId(?string $positionId): void
    {
        $this->positionId = $positionId;
    }
}