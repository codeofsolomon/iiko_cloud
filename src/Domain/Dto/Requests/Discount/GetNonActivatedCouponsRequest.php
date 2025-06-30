<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\Discount;

use IikoApi\Domain\Dto\Requests\OneOrganizationRequest;
use Webmozart\Assert\Assert;

class GetNonActivatedCouponsRequest extends OneOrganizationRequest
{
    public function __construct(
        string $organizationId,
        public string $series,
        public int $pageSize = 10,
        public int $page = 0,
    ) {
        parent::__construct($organizationId);

        Assert::stringNotEmpty($series, 'series обязателен.');
        Assert::greaterThan($pageSize, 0, 'pageSize > 0');
        Assert::greaterThanEq($page, 0, 'page ≥ 0');
    }
}
