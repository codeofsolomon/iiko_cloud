<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\Customer;

use IikoApi\Domain\Dto\Requests\OneOrganizationRequest;
use IikoApi\Domain\Enums\CustomerInfoSearchType;
use Webmozart\Assert\Assert;

class CustomerInfoRequest extends OneOrganizationRequest
{
    public function __construct(
        public string $organizationId,
        public CustomerInfoSearchType $type,
        // параметры поиска
        public ?string $phone = null,
        public ?string $cardTrack = null,
        public ?string $cardNumber = null,
        public ?string $email = null,
        public ?string $id = null,
    ) {
        parent::__construct($organizationId);
        Assert::uuid($organizationId, 'organizationId должен быть валидным UUID.');

    }
}
