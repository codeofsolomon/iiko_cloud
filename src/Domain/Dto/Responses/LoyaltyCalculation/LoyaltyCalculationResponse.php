<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\LoyaltyCalculation;

final readonly class LoyaltyCalculationResponse
{
    /** @param LoyaltyProgramResult[] $loyaltyProgramResults
     *  @param AvailablePayment[]      $availablePayments
     *  @param string[]                $validationWarnings
     *  @param WarningItem[]           $warnings */
    public function __construct(
        public array $loyaltyProgramResults,
        public array $availablePayments,
        public array $validationWarnings,
        public array $warnings,
        public ?string $loyaltyTrace,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            array_map([LoyaltyProgramResult::class, 'fromArray'], $d['loyaltyProgramResults'] ?? []),
            array_map([AvailablePayment::class, 'fromArray'], $d['availablePayments'] ?? []),
            $d['validationWarnings'] ?? [],
            array_map([WarningItem::class, 'fromArray'], $d['Warnings'] ?? []),
            $d['loyaltyTrace'] ?? null,
        );
    }
}
