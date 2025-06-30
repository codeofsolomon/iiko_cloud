<?php

namespace IikoApi\Domain\Dto\Responses\Dictionary;

use IikoApi\Domain\Enums\PaymentProcessingType;
use IikoApi\Domain\Enums\PaymentTypeKind;

/** @property TerminalGroup[] $terminalGroups */
final readonly class PaymentType
{
    public function __construct(
        public string $id,
        public string $code,
        public string $name,
        public ?string $comment,
        public bool $combinable,
        public int $externalRevision,
        /** @var string[] UUID[] */ public array $applicableMarketingCampaigns,
        public bool $isDeleted,
        public bool $printCheque,
        public PaymentProcessingType $paymentProcessingType,
        public PaymentTypeKind $paymentTypeKind,
        public array $terminalGroups,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id: $d['id'],
            code: $d['code'],
            name: $d['name'],
            comment: $d['comment'] ?? null,
            combinable: (bool) $d['combinable'],
            externalRevision: (int) $d['externalRevision'],
            applicableMarketingCampaigns: $d['applicableMarketingCampaigns'] ?? [],
            isDeleted: (bool) $d['isDeleted'],
            printCheque: (bool) $d['printCheque'],
            paymentProcessingType: PaymentProcessingType::from($d['paymentProcessingType']),
            paymentTypeKind: PaymentTypeKind::from($d['paymentTypeKind']),
            terminalGroups: array_map(
                TerminalGroup::class.'::fromArray',
                $d['terminalGroups'] ?? []
            ),
        );
    }
}
