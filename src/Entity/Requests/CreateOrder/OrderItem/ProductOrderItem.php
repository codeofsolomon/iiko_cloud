<?php

namespace IikoApi\Entity\Requests\CreateOrder\OrderItem;

use IikoApi\Entity\Requests\BaseRequest;

class ProductOrderItem extends BaseRequest
{
    /**
     * Domain\Enums: Product, Compound.
     */
    protected string $type = 'Product';

    /**
     * ID of menu item.
     *
     * - Can be obtained by /api/1/nomenclature operation.
     */
    protected string $productId;

    /**
     * Modifiers.
     *
     * @var Modifier[]|null
     */
    protected ?array $modifiers = null;

    /**
     * Price per item unit. Can be sent different from the price in the base menu.
     */
    protected ?float $price = null;

    /**
     * Unique identifier of the item in the order. MUST be unique for the whole system. Therefore it must be generated with Guid.NewGuid().
     *
     * - If sent null, it generates automatically on iikoTransport side.
     */
    protected ?string $positionId = null;

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
        string $productId,
        float $amount,
        ?array $modifiers = null,
        ?float $price = null,
        ?string $positionId = null,
        ?string $productSizeId = null,
        ?ComboInformation $comboInformation = null,
        ?string $comment = null
    ) {
        $this->productId = $productId;
        $this->amount = $amount;
        $this->modifiers = $modifiers;
        $this->price = $price;
        $this->positionId = $positionId;
        $this->productSizeId = $productSizeId;
        $this->comboInformation = $comboInformation;
        $this->comment = $comment ? mb_substr($comment, 0, 255) : null;
    }
}
