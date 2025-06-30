<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\Discount;

use IikoApi\Domain\Dto\Requests\OneOrganizationRequest;

class ProgramsRequest extends OneOrganizationRequest
{
    public function __construct(
        string $organizationId,
        public bool $withoutMarketingCampaigns = false,
    ) {
        parent::__construct($organizationId);
    }
}
