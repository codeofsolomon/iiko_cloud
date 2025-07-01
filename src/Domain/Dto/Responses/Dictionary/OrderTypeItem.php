<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Dictionary;

use IikoApi\Domain\Enums\OrderServiceType;

final readonly class OrderTypeItem
{
    public function __construct(
        public string $id,
        public string $name,
        public OrderServiceType $orderServiceType,
        public bool $isDeleted,
        public int $externalRevision,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id: $d['id'],
            name: $d['name'],
            orderServiceType: OrderServiceType::from($d['orderServiceType']),
            isDeleted: (bool) $d['isDeleted'],
            externalRevision: (int) $d['externalRevision'],
        );
    }
}
