<?php

namespace IikoApi\Entity\Responses\CreateDelivery;


final readonly class CompoundOrderItemComponent
{
    /** @param OrderItemModifier[]|null $modifiers */
    public function __construct(
        public Product $product,
        public ?array  $modifiers,
        public float   $price,
        public float   $cost,
        public bool    $pricePredefined,
        public ?string $positionId,
        public ?float  $taxPercent,
        public ?float  $resultSum,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            Product::fromArray($d['product']),
            isset($d['modifiers']) ? array_map(OrderItemModifier::fromArray(...), $d['modifiers']) : null,
            (float) $d['price'],
            (float) $d['cost'],
            (bool)  $d['pricePredefined'],
            $d['positionId'] ?? null,
            isset($d['taxPercent']) ? (float)$d['taxPercent'] : null,
            isset($d['resultSum']) ? (float)$d['resultSum'] : null,
        );
    }
}