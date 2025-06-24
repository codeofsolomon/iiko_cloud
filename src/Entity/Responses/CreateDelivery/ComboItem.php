<?php

namespace Src\Entity\Responses\CreateDelivery;

final readonly class ComboItem
{
    public function __construct(
        public string $id,
        public string $name,
        public float  $amount,
        public float  $price,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id:     $d['id'],
            name:   $d['name'],
            amount: (float) $d['amount'],
            price:  (float) $d['price'],
        );
    }
}

final readonly class Combo
{
    /** @param ComboItem[] $items */
    public function __construct(
        public string $id,
        public string $name,
        public array  $items,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id:    $d['id'],
            name:  $d['name'],
            items: array_map(ComboItem::class.'::fromArray', $d['items'] ?? []),
        );
    }
}