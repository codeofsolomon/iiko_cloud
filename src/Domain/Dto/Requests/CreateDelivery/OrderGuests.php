<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateDelivery;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

class OrderGuests extends BaseRequest
{
    public function __construct(
        public int $count,
        public bool $splitBetweenPersons = false,
    ) {
        Assert::greaterThan($count, 0, 'count должен быть > 0');
    }
}
