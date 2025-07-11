<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\LoyaltyCalculation;

final readonly class AvailableCombo
{
    /** @param ComboGroupMapping[] $groupMapping */
    public function __construct(
        public string $specificationId,
        public array $groupMapping,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['specificationId'],
            array_map([ComboGroupMapping::class, 'fromArray'], $d['groupMapping'] ?? []),
        );
    }
}
