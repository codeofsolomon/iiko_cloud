<?php

namespace IikoApi\Domain\Dto\Responses\CreateDelivery;

final readonly class LoyaltyInfo
{
    public function __construct(
        public ?string $coupon,
        public ?array $appliedManualConditions,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            coupon: $d['coupon'] ?? null,
            appliedManualConditions: $d['appliedManualConditions'] ?? null,
        );
    }
}
