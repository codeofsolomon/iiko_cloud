<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

/* ------------------------------------------------------------------
 | 2. OrderCombo
 * ----------------------------------------------------------------- */
class OrderCombo extends BaseRequest
{
    /**
     * @param  int  $amount  ≥ 1
     * @param  float  $price  ≥ 0
     */
    public function __construct(
        public string $id,           // UUID combo
        public string $name,
        public int $amount,
        public float $price,
        public string $sourceId,     // UUID validity/action
        public ?string $programId = null,
        public ?string $sizeId = null,
    ) {
        Assert::uuid($id);
        Assert::stringNotEmpty($name);
        Assert::greaterThanEq($amount, 1);
        Assert::greaterThanEq($price, 0);
        Assert::uuid($sourceId);
        Assert::nullOrUuid($programId);
        Assert::nullOrUuid($sizeId);
    }
}
