<?php

namespace IikoApi\Entity\Responses\CreateDelivery;

final readonly class DiscountInfo
{
    public function __construct(
        public DiscountType $discountType,
        public float $sum,
        public ?bool $selectivePositions,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            discountType: DiscountType::fromArray($d['discountType']),
            sum: (float) $d['sum'],
            selectivePositions: (bool) $d['selectivePositions'] ?? null,
        );
    }
}
