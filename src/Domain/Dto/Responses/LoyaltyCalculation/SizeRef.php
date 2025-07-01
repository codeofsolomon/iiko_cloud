<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\LoyaltyCalculation;

final readonly class SizeRef
{
    public function __construct(
        public ?string $id,
        public ?string $name,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self($d['id'] ?? null, $d['name'] ?? null);
    }
}
