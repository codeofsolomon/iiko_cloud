<?php

namespace IikoApi\Entity\Responses\Menu;

final readonly class Price
{
    public function __construct(
        public int  $currentPrice,
        public bool $isIncludedInMenu,
        public int  $nextPrice,
        public bool $nextIncludedInMenu,
        public ?string $nextDatePrice,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            currentPrice:         (int) $data['currentPrice'],
            isIncludedInMenu:     (bool) $data['isIncludedInMenu'],
            nextPrice:            (int) $data['nextPrice'],
            nextIncludedInMenu:   (bool) $data['nextIncludedInMenu'],
            nextDatePrice:        $data['nextDatePrice'] ?? null,
        );
    }
}