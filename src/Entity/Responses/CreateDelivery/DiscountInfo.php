<?php

namespace Src\Entity\Responses\CreateDelivery;

final readonly class DiscountInfo
{
    public function __construct(
        public string $id,
        public string $name,
        public float  $sum,
        public bool   $isManual,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id:      $d['id'],
            name:    $d['name'],
            sum:     (float) $d['sum'],
            isManual:(bool) $d['isManual'],
        );
    }
}