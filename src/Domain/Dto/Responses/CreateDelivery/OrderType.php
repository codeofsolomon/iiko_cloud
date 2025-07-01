<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\CreateDelivery;

use IikoApi\Domain\Enums\OrderServiceType;

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
            name: $d['name'],
            orderServiceType: OrderServiceType::from($d['orderServiceType'])
        );
    }
}
