<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Dictionary;

final readonly class DiscountResponse
{
    public function __construct(
        public string $correlationId,
        public array $discounts,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            correlationId: $d['correlationId'],
            discounts: array_map(
                Discount::class.'::fromArray',
                $d['discounts'] ?? []
            ),
        );
    }
}
