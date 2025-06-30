<?php

namespace IikoApi\Domain\Dto\Requests\CreateOrder\OrderItem;

use IikoApi\Domain\Dto\Requests\BaseRequest;

class Componenet extends BaseRequest
{
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

    protected ?string $positionId = null;

    public function __construct(
        string $productId,
        ?array $modifiers = null,
        ?float $price = null,
        ?string $positionId = null,
    ) {
        $this->productId = $productId;
        $this->modifiers = $modifiers;
        $this->price = $price;
        $this->positionId = $positionId;

    }
}
