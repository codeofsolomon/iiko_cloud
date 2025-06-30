<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\Discount;

use IikoApi\Domain\Dto\Requests\OneOrganizationRequest;
use Webmozart\Assert\Assert;

class GetCouponRequest extends OneOrganizationRequest
{
    public function __construct(
        string $organizationId,
        public string $series,
        public string $number,
    ) {
        parent::__construct($organizationId);

        Assert::stringNotEmpty($series, 'series обязателен.');
        Assert::stringNotEmpty($number, 'number обязателен.');
    }
}
