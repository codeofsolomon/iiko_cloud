<?php

namespace IikoApi\Entity\Responses\LoyaltyCalculation;

final readonly class DiscountItem
{
    public function __construct(
        public int    $code,
        public ?string $orderItemId,
        public ?string $positionId,
        public float  $discountSum,
        public ?float  $amount,
        public ?string $comment,
    ) {}
    public static function fromArray(array $d): self
    {
        return new self(
            (int)$d['code'],
            $d['orderItemId'] ?? null,
            $d['positionId'] ?? null,
            (float)$d['discountSum'],
            (float)$d['amount'] ?? null,
            $d['comment'] ?? null,
        );
    }
}