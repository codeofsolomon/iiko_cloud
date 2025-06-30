<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\Customer;

use DateTimeInterface;
use IikoApi\Domain\Dto\Requests\OneOrganizationRequest;
use IikoApi\Domain\Enums\ConsentStatus;
use IikoApi\Domain\Enums\SexType;
use Webmozart\Assert\Assert;

class CustomerCreateOrUpdateRequest extends OneOrganizationRequest
{
    public function __construct(
        public string $organizationId,
        public ?string $id = null,
        public ?string $phone = null,
        public ?string $email = null,
        public ?string $cardTrack = null,
        public ?string $cardNumber = null,
        public ?string $name = null,
        public ?string $surName = null,
        public ?string $middleName = null,
        public SexType $sex = SexType::Unknown,
        public ConsentStatus $consentStatus = ConsentStatus::Unknown,
        public ?DateTimeInterface $birthday = null,
        public bool $shouldReceivePromoActionsInfo = false,
        public bool $shouldReceiveLoyaltyInfo = false,
        public ?string $referrerId = null,
        public ?string $userData = null,
        public ?bool $isDeleted = null,
    ) {
        parent::__construct($organizationId);
        // ---- Валидация входа ----------------------------------------------
        Assert::uuid($organizationId, 'organizationId должен быть UUID.');
        Assert::nullOrUuid($id, 'id должен быть UUID.');
        Assert::nullOrUuid($referrerId, 'referrerId должен быть UUID.');

        Assert::nullOrStringNotEmpty($phone);
        Assert::nullOrStringNotEmpty($cardTrack);
        Assert::nullOrStringNotEmpty($cardNumber);

        Assert::nullOrEmail($email, 'Некорректный email.');
    }
}
