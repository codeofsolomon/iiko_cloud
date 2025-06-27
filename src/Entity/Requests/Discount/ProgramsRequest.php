<?php

namespace IikoApi\Entity\Requests\Discount;

use IikoApi\Entity\Requests\BaseRequest;

class ProgramsRequest extends BaseRequest
{
     public function __construct(
        private string $organizationIds,
        private ?bool $withoutMarketingCampaigns,
    ) {}
}