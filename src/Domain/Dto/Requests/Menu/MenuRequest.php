<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\Menu;

use IikoApi\Domain\Dto\Requests\OneOrganizationRequest;
use Webmozart\Assert\Assert;

/**
 * /menu
 *
 * • `organizationId` — обязательный UUID организации.
 * • `startRevision` — номер ревизии меню, с которого нужны изменения
 *   (null ⇒ полный справочник).
 *
 * Объект **immutable** (`readonly`) и валидируется при создании.
 */
class MenuRequest extends OneOrganizationRequest
{
    public function __construct(
        public string $organizationId,
        public ?int $startRevision = null,
    ) {
        parent::__construct($organizationId);

        Assert::uuid($organizationId, 'organizationId должен быть валидным UUID.');
        Assert::nullOrGreaterThanEq($startRevision, 0, 'startRevision ≥ 0');
    }
}
