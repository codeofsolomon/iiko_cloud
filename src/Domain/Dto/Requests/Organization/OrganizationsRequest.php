<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\Organization;

use IikoApi\Domain\Dto\Requests\MinimalRequest;
use Webmozart\Assert\Assert;

class OrganizationsRequest extends MinimalRequest
{
    /**
     * @param  string[]  $organizationIds
     * @param  string[]  $returnExternalData
     */
    public function __construct(
        public array $organizationIds = [],
        public bool $returnAdditionalInfo = true,
        public bool $includeDisabled = true,
        public array $returnExternalData = [],

    ) {
        Assert::allStringNotEmpty($returnExternalData, 'returnExternalData содержит только непустые строки.');
        parent::__construct($organizationIds);
    }
}
