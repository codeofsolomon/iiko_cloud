<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Menu;

final readonly class Price
{
    public function __construct(
        public float $currentPrice,
        public bool $isIncludedInMenu,
        public float $nextPrice,
        public bool $nextIncludedInMenu,
        public ?string $nextDatePrice,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            currentPrice: (float) $data['currentPrice'],
            isIncludedInMenu: (bool) $data['isIncludedInMenu'],
            nextPrice: (float) $data['nextPrice'],
            nextIncludedInMenu: (bool) $data['nextIncludedInMenu'],
            nextDatePrice: $data['nextDatePrice'] ?? null,
        );
    }
}
