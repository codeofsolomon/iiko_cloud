<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\DiscountsInfo;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

/* ------------------------------------------------------------------
 | 2. Скидка «iikoCard»
 * ----------------------------------------------------------------- */
class DiscountIikoCard extends BaseRequest
{
    /** Тип фиксирован строкой, требуемой API */
    public string $type = 'iikoCard';

    /**
     * @param  DiscountItem[]  $discountItems
     */
    public function __construct(
        public string $programId,
        public string $programName,
        public array $discountItems = [],
    ) {
        Assert::uuid($programId);
        Assert::stringNotEmpty($programName);
        Assert::allIsInstanceOf($discountItems, DiscountItem::class);
    }
}
