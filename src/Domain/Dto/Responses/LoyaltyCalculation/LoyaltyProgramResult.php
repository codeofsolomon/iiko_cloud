<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\LoyaltyCalculation;

final readonly class LoyaltyProgramResult
{
    /** @param DiscountItem[] $discounts
     *  @param Upsale[]        $upsales
     *  @param FreeProductsBlock[] $freeProducts
     *  @param string[]        $availableComboSpecifications
     *  @param AvailableCombo[] $availableCombos */
    public function __construct(
        public string $marketingCampaignId,
        public string $name,
        public array $discounts,
        public array $upsales,
        public array $freeProducts,
        public array $availableComboSpecifications,
        public array $availableCombos,
        public bool $needToActivateCertificate,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['marketingCampaignId'],
            $d['name'],
            array_map([DiscountItem::class, 'fromArray'], $d['discounts'] ?? []),
            array_map([Upsale::class, 'fromArray'], $d['upsales'] ?? []),
            array_map([FreeProductsBlock::class, 'fromArray'], $d['freeProducts'] ?? []),
            $d['availableComboSpecifications'] ?? [],
            array_map([AvailableCombo::class, 'fromArray'], $d['availableCombos'] ?? []),
            (bool) $d['needToActivateCertificate'],
        );
    }
}
