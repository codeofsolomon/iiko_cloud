<?php

namespace IikoApi\Entity\Requests\Customer;

use IikoApi\Entity\Requests\BaseRequest;
use IikoApi\Enum\SexType;
use IikoApi\Enum\ConsentStatus;

class CustomerCreateOrUpdateRequest extends BaseRequest
{
    public function __construct(
        protected string                         $organizationId,
        // основная идентификация
        protected ?string $id               = null,   // если update по UUID
        // контакты
        protected ?string $phone            = null,
        protected ?string $email            = null,

        // карта / трек
        protected ?string $cardTrack        = null,
        protected ?string $cardNumber       = null,

        // ФИО + пол
        protected ?string $name             = null,
        protected ?string $surName          = null,
        protected ?string $middleName       = null,
        protected SexType $sex              = SexType::Unknown,
        protected ConsentStatus $consentStatus = ConsentStatus::Unknown,

        // др. сведения
        protected ?string $birthday         = null,  // YYYY-MM-DD

        protected bool    $shouldReceivePromoActionsInfo = false,
        protected bool $shouldReceiveLoyaltyInfo = false,
        protected ?string $referrerId = null,
        protected ?string $userData = null,
        protected ?bool $isDeleted = null,


    ) {}
}
