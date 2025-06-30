<?php

namespace IikoApi\Entity\Responses\CreateDelivery;

use IikoApi\Enum\OrderServiceType;

final readonly class OrderType
{
    public function __construct(
        public string $id,
        public string $name,
        public OrderServiceType $orderServiceType
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id: $d['id'],
            name:    $d['name'],
            orderServiceType: OrderServiceType::from($d['orderServiceType'])
        );
    }
}