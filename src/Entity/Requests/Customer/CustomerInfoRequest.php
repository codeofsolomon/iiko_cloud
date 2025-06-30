<?php

namespace IikoApi\Entity\Requests\Customer;

use IikoApi\Entity\Requests\BaseRequest;

enum CustomerInfoSearchType: string
{
    case Phone = 'phone';
    case CardTrack = 'cardTrack';
    case CardNumber = 'cardNumber';
    case Email = 'email';
    case Id = 'id';
}

class CustomerInfoRequest extends BaseRequest
{
    public function __construct(
        protected string $organizationId,
        protected CustomerInfoSearchType $type,

        // параметры поиска (опциональны — см. $type)
        protected ?string $phone = null,
        protected ?string $cardTrack = null,
        protected ?string $cardNumber = null,
        protected ?string $email = null,
        protected ?string $id = null,
    ) {}
}
