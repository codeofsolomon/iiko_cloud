<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests;

use Webmozart\Assert\Assert;

/**
 * Базовый класс для discount-запросов.
 * Содержит единственный UUID организации.
 */
abstract class OneOrganizationRequest extends BaseRequest
{
    public function __construct(public string $organizationId)
    {
        Assert::uuid($organizationId, 'organizationId должен быть валидным UUID.');
    }
}
