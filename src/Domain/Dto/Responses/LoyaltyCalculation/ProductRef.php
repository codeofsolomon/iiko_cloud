<?php

namespace IikoApi\Domain\Dto\Responses\LoyaltyCalculation;

final readonly class ProductRef
{
    public function __construct(
        public ?string $id,
        public string $code,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self($d['id'] ?? null, $d['code']);
    }
}
