<?php

namespace IikoApi\Entity\Requests\CreateOrder\OrderItem;

use IikoApi\Entity\Requests\BaseRequest;

class CompoundOrderItem extends BaseRequest
{
     /**
     * Enum: Product, Compound.
     */
    protected string $type = 'Compound';

    protected Componenet $primaryComponent;

    protected ?Componenet $secondaryComponent;


    /**
     * commonModifiers.
     *
     * @var Modifier[]|null
     */
    protected ?array $commonModifiers = null;

    /**
     * Quantity.
     *
     * [ 0 .. 999.999 ]
     */
    protected float $amount;

    /**
     * Size ID. Required if a stock list item has a size scale.
     */
    protected ?string $productSizeId = null;

    /**
     * Size ID. Required if a stock list item has a size scale.
     */
    protected ?ComboInformation $comboInformation = null;


    /**
     * Comment.
     *
     * - [ 0 .. 255 ] characters
     */
    protected ?string $comment = null;


     public function __construct(
        Componenet $primaryComponent,
        float $amount,
        ?Componenet $secondaryComponent = null,
        ?array $commonModifiers = null,
        ?string $productSizeId = null,
        ?ComboInformation $comboInformation = null,
        ?string $comment = null
    )
    {
        $this->primaryComponent = $primaryComponent;
        $this->amount = $amount;
        $this->commonModifiers = $commonModifiers;
        $this->secondaryComponent = $secondaryComponent;
        $this->productSizeId = $productSizeId;
        $this->comboInformation = $comboInformation;
        $this->comment = $comment ? mb_substr($comment, 0, 255) : null;
    }



}