<?php

namespace Src\Entity\Responses\CreateDelivery;

final readonly class Combo
{
    public function __construct(
        public string $id,
        public string $name,
        public float  $amount,
        public float  $price,
        public string $sourceId,
        public ?ProductSize $size
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id:     $d['id'],
            name:   $d['name'],
            amount: (float) $d['amount'],
            price:  (float) $d['price'],
            sourceId: $d['sourceId'],
            size: isset($d['size']) && $d['size'] != null ? ProductSize::fromArray($d['size']) : null
        );
    }
}
