<?php

namespace IikoApi\Entity\Requests\Discount;

use IikoApi\Entity\Requests\BaseRequest;

class GetNonActivatedCouponsRequest extends BaseRequest
{
    public function __construct(
        private string $organizationIds,
        private string $series,
        private int $pageSize = 10,
        private int $page = 0
    ) {}
}