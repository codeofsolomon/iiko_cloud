<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Menu;

final readonly class Modifier
{
    public function __construct(
        public string $productId,
        public int $amount,
        public ?int $price,
        public ?string $productGroupId,
        public ?string $positionId,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            productId: $data['productId'],
            amount: (int) $data['amount'],
            price: isset($data['price']) ? (int) $data['price'] : null,
            productGroupId: $data['productGroupId'] ?? null,
            positionId: $data['positionId'] ?? null,
        );
    }
}
