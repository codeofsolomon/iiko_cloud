<?php

namespace IikoApi\Entity\Requests\CreateOrder;

use IikoApi\Entity\Requests\BaseRequest;

class OrderCombo extends BaseRequest
{
    /**
     * Combo ID.
     */
    protected string $id;

    /**
     * Name of combo.
     */
    protected string $name;

    /**
     * Quantity.
     */
    protected int $amount;

    /**
     * Price of one combo.
     */
    protected float $price;

    /**
     * Combo validity ID.
     */
    protected string $sourceId;

    /**
     * Card program ID.
     */
    protected ?string $programId = null;

    protected ?string $sizeId = null;

    public function __construct(string $id, string $name, int $amount, float $price, string $sourceId,
    ?string $programId = null, ?string $sizeId = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->amount = $amount;
        $this->price = $price;
        $this->sourceId = $sourceId;
        $this->programId = $programId;
        $this->sizeId = $sizeId;
    }
}