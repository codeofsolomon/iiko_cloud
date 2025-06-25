<?php

namespace Src\Entity\Responses\CreateDelivery;

final readonly class OrderType
{
    public function __construct(
        public string $id,
        public string $name,
        public string $orderServiceType
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id: $d['id'],
            name:    $d['name'],
            orderServiceType: $d['orderServiceType']
        );
    }
}