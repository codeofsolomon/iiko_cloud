<?php

namespace IikoApi\Entity\Responses\Dictionary;

use IikoApi\Domain\Enums\DiscountMode;

/** @property ProductCategoryDiscount[] $productCategoryDiscounts */
final readonly class DiscountCardTypeInfo
{
    public function __construct(
        public string $id,
        public string $name,
        public float $percent,
        public bool $isCategorisedDiscount,
        public array $productCategoryDiscounts,
        public ?string $comment,
        public bool $canBeAppliedSelectively,
        public ?float $minOrderSum,
        public DiscountMode $mode,
        public ?float $sum,
        public bool $canApplyByCardNumber,
        public bool $isManual,
        public bool $isCard,
        public bool $isAutomatic,
        public bool $isDeleted,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id: $d['id'],
            name: $d['name'],
            percent: (float) $d['percent'],
            isCategorisedDiscount: (bool) $d['isCategorisedDiscount'],
            productCategoryDiscounts: array_map(
                ProductCategoryDiscount::class.'::fromArray',
                $d['productCategoryDiscounts'] ?? []
            ),
            comment: $d['comment'] ?? null,
            canBeAppliedSelectively: (bool) $d['canBeAppliedSelectively'],
            minOrderSum: isset($d['minOrderSum']) ? (float) $d['minOrderSum'] : null,
            mode: DiscountMode::from($d['mode']),
            sum: isset($d['sum']) ? (float) $d['sum'] : null,
            canApplyByCardNumber: (bool) $d['canApplyByCardNumber'],
            isManual: (bool) $d['isManual'],
            isCard: (bool) $d['isCard'],
            isAutomatic: (bool) $d['isAutomatic'],
            isDeleted: (bool) $d['isDeleted'],
        );
    }
}
