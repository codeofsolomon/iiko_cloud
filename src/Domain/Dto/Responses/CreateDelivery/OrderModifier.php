<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\CreateDelivery;

enum OrderItemType: string
{
    case Product = 'Product';
    case Modifier = 'Modifier';
}

final readonly class OrderModifier
{
    public function __construct(
        public string $id,
        public string $productId,
        public string $name,
        public float $amount,
        public float $price,
        public OrderItemType $type,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id: $d['id'],
            productId: $d['productId'],
            name: $d['name'],
            amount: (float) $d['amount'],
            price: (float) $d['price'],
            type: OrderItemType::from($d['type']),
        );
    }
}
