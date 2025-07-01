<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Discount;

final readonly class MarketingCampaign
{
    public function __construct(
        public ?string $id,
        public ?string $programId,
        public ?string $name,
        public ?string $description,
        public bool $isActive,
        public string $periodFrom,
        public ?string $periodTo,
        public array $orderActionConditionBindings,
        public array $periodicActionConditionBindings,
        public array $overdraftActionConditionBindings,
        public array $guestRegistrationActionConditionBindings,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'] ?? null,
            $d['programId'] ?? null,
            $d['name'] ?? null,
            $d['description'] ?? null,
            (bool) $d['isActive'],
            $d['periodFrom'],
            $d['periodTo'] ?? null,
            array_map([ActionConditionBinding::class, 'fromArray'], $d['orderActionConditionBindings'] ?? []),
            array_map([ActionConditionBinding::class, 'fromArray'], $d['periodicActionConditionBindings'] ?? []),
            array_map([ActionConditionBinding::class, 'fromArray'], $d['overdraftActionConditionBindings'] ?? []),
            array_map([ActionConditionBinding::class, 'fromArray'], $d['guestRegistrationActionConditionBindings'] ?? []),
        );
    }
}
