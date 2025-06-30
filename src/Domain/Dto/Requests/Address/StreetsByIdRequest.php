<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\Address;

use IikoApi\Domain\Dto\Requests\MinimalRequest;
use Webmozart\Assert\Assert;

class StreetsByIdRequest extends MinimalRequest
{
    /** @param string[] $streetIds  UUID-ы улиц */
    /** @param string[] $classifierIds UUID-ы классификаторов ФИАС (опционально) */
    public function __construct(
        array $organizationIds,
        public array $streetIds,
        public array $classifierIds = [],
    ) {
        Assert::allUuid($streetIds, 'Все streetIds должны быть UUID.');
        Assert::allUuid($classifierIds, 'Все classifierIds должны быть UUID.');
        parent::__construct($organizationIds);
    }
}
