<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Dictionary;

final readonly class Discount
{
    /** @param DiscountCardTypeInfo[] $items */
    public function __construct(
        public string $organizationId,
        public array $items,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            organizationId: $d['organizationId'],
            items: array_map(
                DiscountCardTypeInfo::class.'::fromArray',
                $d['items'] ?? []
            ),
        );
    }
}
