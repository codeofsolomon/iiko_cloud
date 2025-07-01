<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\DiscountsInfo;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

/* ------------------------------------------------------------------
 | 1. Скидка/надбавка на конкретную позицию
 * ----------------------------------------------------------------- */
class DiscountItem extends BaseRequest
{
    public function __construct(
        public string $positionId,  // UUID позиции заказа
        public float $sum,         // сумма скидки/надбавки
        public float $amount       // количество
    ) {
        Assert::uuid($positionId);
        Assert::greaterThan($amount, 0);
    }
}
