<?php

namespace Src\Entity\Responses\CreateDelivery;

final readonly class IikoCard5Info
{
    public function __construct(
        public ?string $couponNumber = null,
        public ?string $programId    = null,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            couponNumber: $d['couponNumber'] ?? null,
            programId:    $d['programId']    ?? null,
        );
    }
}