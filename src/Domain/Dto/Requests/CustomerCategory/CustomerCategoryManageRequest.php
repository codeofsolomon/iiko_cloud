<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CustomerCategory;

use IikoApi\Domain\Dto\Requests\OneOrganizationRequest;
use Webmozart\Assert\Assert;

/**
 * Привязать (или отвязать) гостя к категории.
 * Конкретное действие («add»/«remove») задаётся на уровне API‐энд-пойнта,
 * поэтому в DTO только идентификаторы.
 */
class CustomerCategoryManageRequest extends OneOrganizationRequest
{
    public function __construct(
        public string $organizationId,   // UUID организации
        public string $customerId,       // UUID клиента
        public string $categoryId,       // UUID категории
    ) {
        parent::__construct($organizationId);
        Assert::uuid($organizationId, 'organizationId должен быть UUID.');
        Assert::uuid($customerId, 'customerId должен быть UUID.');
        Assert::uuid($categoryId, 'categoryId должен быть UUID.');
    }
}
