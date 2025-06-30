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

        // Проверяем, что указан ровно один нужный параметр,
        // соответствующий выбранному $type.
        $map = [
            CustomerInfoSearchType::Phone => $phone,
            CustomerInfoSearchType::CardTrack => $cardTrack,
            CustomerInfoSearchType::CardNumber => $cardNumber,
            CustomerInfoSearchType::Email => $email,
            CustomerInfoSearchType::Id => $id,
        ];

        $value = $map[$type] ?? null;

        Assert::notNull($value, sprintf(
            'Для поиска типа "%s" необходимо передать одноимённый параметр.',
            $type->value
        ));

        // Дополнительно можно валидацию формата:
        match ($type) {
            CustomerInfoSearchType::Phone => Assert::stringNotEmpty($phone),
            CustomerInfoSearchType::Email => Assert::email($email),
            CustomerInfoSearchType::Id => Assert::uuid($id),
            default => Assert::stringNotEmpty($value),
        };
    }
}
