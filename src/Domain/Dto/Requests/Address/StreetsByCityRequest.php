<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\Address;

use IikoApi\Domain\Dto\Requests\MinimalRequest;
use Webmozart\Assert\Assert;

class StreetsByCityRequest extends MinimalRequest
{
    public function __construct(
        array $organizationIds,
        public string $cityId = '',
        public bool $includeDeleted = false,
    ) {
        Assert::uuid($cityId, 'cityId должен быть валидным UUID или пустой строкой.');
        parent::__construct($organizationIds);
    }
}
