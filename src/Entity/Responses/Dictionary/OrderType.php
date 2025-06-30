<?php

namespace IikoApi\Entity\Responses\Dictionary;

/** @property OrderTypeItem[] $items */
final readonly class OrderType
{
    public function __construct(
        public string $organizationId,
        public array $items,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            organizationId: $d['organizationId'],
            items: array_map(
                OrderTypeItem::class.'::fromArray',
                $d['items'] ?? []
            ),
        );
    }
}
