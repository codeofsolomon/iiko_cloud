<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\DiscountsInfo;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

/* ------------------------------------------------------------------
 | 3. Скидка «RMS»
 * ----------------------------------------------------------------- */
class DiscountRMS extends BaseRequest
{
    public string $type = 'RMS';

    /**
     * @param  string[]|null  $selectivePositions
     */
    public function __construct(
        public string $discountTypeId,     // UUID типа скидки
        public ?float $sum = null,
        public ?array $selectivePositions = null,
    ) {
        Assert::uuid($discountTypeId);
        Assert::nullOrGreaterThan($sum, 0);
        Assert::nullOrAllUuid($selectivePositions);
    }
}
