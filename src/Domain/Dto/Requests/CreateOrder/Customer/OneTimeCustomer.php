<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\Customer;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

/* -------------------------------------------------------------------------
 | 1. Одноразовый гость
 * ---------------------------------------------------------------------- */
class OneTimeCustomer extends BaseRequest
{
    /** Всегда «one-time» — требуется iiko API */
    public string $type = 'one-time';

    public function __construct(public string $name)
    {
        Assert::stringNotEmpty($name);
        Assert::maxLength($name, 60, 'name ≤ 60 символов');
    }
}
