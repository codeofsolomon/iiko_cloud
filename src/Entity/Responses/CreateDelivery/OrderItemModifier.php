<?php

namespace IikoApi\Entity\Responses\CreateDelivery;

final readonly class OrderItemModifier
{
    public function __construct(
        public Product $product,
        public float $amount,
        public bool $amountIndependentOfParentAmount,
        public ?ProductGroup $productGroup,
        public float $price,
        public bool $pricePredefined,
        public float $resultSum,
        public ?ItemDeletedInfo $deleted,
        public ?string $positionId,
        public ?int $defaultAmount,
        public ?bool $hideIfDefaultAmount,
        public ?float $taxPercent,
        public ?int $freeOfChargeAmount,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            Product::fromArray($d['product']),
            (float) $d['amount'],
            (bool) $d['amountIndependentOfParentAmount'],
            isset($d['productGroup']) ? ProductGroup::fromArray($d['productGroup']) : null,
            (float) $d['price'],
            (bool) $d['pricePredefined'],
            (float) $d['resultSum'],
            isset($d['deleted']) ? ItemDeletedInfo::fromArray($d['deleted']) : null,
            $d['positionId'] ?? null,
            isset($d['defaultAmount']) ? (int) $d['defaultAmount'] : null,
            isset($d['hideIfDefaultAmount']) ? (bool) $d['hideIfDefaultAmount'] : null,
            isset($d['taxPercent']) ? (float) $d['taxPercent'] : null,
            isset($d['freeOfChargeAmount']) ? (int) $d['freeOfChargeAmount'] : null,
        );
    }
}
