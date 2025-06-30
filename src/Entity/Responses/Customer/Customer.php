<?php

namespace IikoApi\Entity\Responses\Customer;

use IikoApi\Domain\Enums\ConsentStatus;
use IikoApi\Domain\Enums\SexType;

enum CustomerType: string
{
    case Regular = 'regular';  // постоянный
    case OneTime = 'onetime';  // «одноразовый гость»
}

final readonly class Customer
{
    public function __construct(
        public string $id, //
        public ?string $name,//
        public ?string $surname,//
        public ?string $middleName,//
        public ?string $comment,//
        public SexType $sex, //
        public ConsentStatus $consentStatus, //

        public ?string $phone,//
        public ?string $cultureName, //
        public ?string $email, //
        public ?string $birthday,   //            // YYYY-MM-DD
        public bool $shouldReceivePromoActionsInfo,//
        public bool $shouldReceiveLoyaltyInfo,//
        public bool $shouldReceiveOrderStatusInfo,//
        public ?string $referrerId,//

        public array $walletBalances,//
        public array $cards, //
        public array $categories,//
        public ?string $externalId,
        public bool $anonymized, //
        public string $userData, //
        public ?string $personalDataConsentFrom,
        public ?string $personalDataConsentTo,
        public ?string $personalDataProcessingFrom,
        public ?string $personalDataProcessingTo,
        public ?bool $isDeleted,
        public string $whenRegistered,
        public ?string $lastProcessedOrderDate,
        public ?string $firstOrderDate,
        public ?string $lastVisitedOrganizationId,
        public ?string $registrationOrganizationId,

    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'],
            $d['name'] ?? null,
            $d['surname'] ?? null,
            $d['middleName'] ?? null,
            $d['comment'] ?? null,
            SexType::from($d['sex'] ?? 0),
            ConsentStatus::from($d['consentStatus'] ?? 0),

            $d['phone'] ?? null,
            $d['cultureName'] ?? null,
            $d['email'] ?? null,
            $d['birthday'] ?? null,
            (bool) ($d['shouldReceivePromoActionsInfo'] ?? false),
            (bool) ($d['shouldReceiveLoyaltyInfo'] ?? false),
            (bool) ($d['shouldReceiveOrderStatusInfo'] ?? false),
            $d['referrerId'] ?? null,

            array_map([WalletBalance::class, 'fromArray'], $d['walletBalances'] ?? []),
            array_map([Card::class, 'fromArray'], $d['cards'] ?? []),
            array_map([Category::class, 'fromArray'], $d['categories'] ?? []),
            $d['externalId'] ?? null,
            (bool) $d['anonymized'],
            $d['userData'],
            $d['personalDataConsentFrom'] ?? null,
            $d['personalDataConsentTo'] ?? null,
            $d['personalDataProcessingFrom'] ?? null,
            $d['personalDataProcessingTo'] ?? null,
            (bool) $d['isDeleted'] ?? null,
            $d['whenRegistered'],
            $d['lastProcessedOrderDate'] ?? null,
            $d['firstOrderDate'] ?? null,
            $d['lastVisitedOrganizationId'] ?? null,
            $d['registrationOrganizationId'] ?? null,
        );
    }
}
