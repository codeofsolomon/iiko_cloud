<?php

namespace IikoApi\Entity\Requests\Discount;

use IikoApi\Entity\Requests\BaseRequest;

class GetCouponSeriesRequest extends BaseRequest
{
     public function __construct(
        private string $organizationIds,
    ) {}
}
