<?php

namespace IikoApi\Entity\Requests\Discount;

use IikoApi\Entity\Requests\BaseRequest;

class GetCouponRequest extends BaseRequest
{
    public function __construct(
        private string $organizationIds,
        private ?string $series,
        private ?string $number
    ) {}
}