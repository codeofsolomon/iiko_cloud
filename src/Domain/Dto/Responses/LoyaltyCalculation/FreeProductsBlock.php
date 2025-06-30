<?php

namespace IikoApi\Domain\Dto\Responses\LoyaltyCalculation;

final readonly class FreeProductsBlock
{
    /** @param FreeProduct[] $products */
    public function __construct(
        public string $sourceActionId,
        public ?string $descriptionForUser,
        public array $products,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['sourceActionId'],
            $d['descriptionForUser'] ?? null,
            array_map([FreeProduct::class, 'fromArray'], $d['products'] ?? []),
        );
    }
}
