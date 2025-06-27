<?php

namespace IikoApi\Entity\Responses\Discount;

use IikoApi\Enum\ProgramType;
use IikoApi\Enum\ProgramTemplateType;

final readonly class ProgramItem
{
     public function __construct(
        public string  $id,
        public ?string  $name,
        public ?string $description,
        public string  $serviceFrom,               // "2019-08-24 14:15:22.123"
        public ?string  $serviceTo,
        public bool    $notifyAboutBalanceChanges,
        public ProgramType     $programType,
        public bool    $isActive,
        public ?string  $walletId,
        public array   $marketingCampaigns,
        public array   $appliedOrganizations,
        public ProgramTemplateType     $templateType,
        public bool    $isExchangeRateEnabled,
        public int     $refillType,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'],
            $d['name'] ?? null,
            $d['description'] ?? null,
            $d['serviceFrom'],
            $d['serviceTo'] ?? null,
            (bool)$d['notifyAboutBalanceChanges'],
            ProgramType::from($d['programType']),
            (bool)$d['isActive'],
            $d['walletId'] ?? null,
            array_map([MarketingCampaign::class,'fromArray'], $d['marketingCampaigns'] ?? []),
            $d['appliedOrganizations'] ?? [],
            ProgramTemplateType::from($d['templateType']),
            (bool)$d['isExchangeRateEnabled'],
            (int) $d['refillType'],
        );
    }
}