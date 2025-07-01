<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\LoyaltyCalculation;

final readonly class ComboGroupMapping
{
    public function __construct(
        public string $groupId,
        public ?string $itemId,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self($d['groupId'], $d['itemId'] ?? null);
    }
}
