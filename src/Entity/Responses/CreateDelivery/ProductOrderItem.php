<?php

namespace IikoApi\Entity\Responses\CreateDelivery;

use DateTimeImmutable;
use IikoApi\Domain\Enums\OrderItemStatus;

final readonly class ProductOrderItem extends OrderItem
{
    /** @param OrderItemModifier[]|null $modifiers */
    public function __construct(
        string $type,
        OrderItemStatus $status,
        ?ItemDeletedInfo $deleted,
        float $amount,
        ?string $comment,
        ?DateTimeImmutable $whenPrinted,
        ?ProductSize $size,
        ?ComboItemInformation $comboInformation,
        public Product $product,
        public ?array $modifiers,
        public float $price,
        public float $cost,
        public bool $pricePredefined,
        public ?string $positionId,
        public ?int $defaultAmount,
        public ?bool $hideIfDefaultAmount,
        public ?float $taxPercent,
        public ?int $freeOfChargeAmount,
    ) {
        parent::__construct(...func_get_args());
    }

    public static function fromArray(array $d): self
    {
        [$type, $status, $deleted, $amount, $comment,
            $whenPrinted, $size, $comboInfo] = parent::baseFromArray($d);

        return new self(
            $type, $status, $deleted, $amount, $comment, $whenPrinted, $size, $comboInfo,
            Product::fromArray($d['product']),
            isset($d['modifiers']) ? array_map(OrderItemModifier::fromArray(...), $d['modifiers']) : null,
            (float) $d['price'],
            (float) $d['cost'],
            (bool) $d['pricePredefined'],
            $d['positionId'] ?? null,
            isset($d['defaultAmount']) ? (int) $d['defaultAmount'] : null,
            isset($d['hideIfDefaultAmount']) ? (bool) $d['hideIfDefaultAmount'] : null,
            isset($d['taxPercent']) ? (float) $d['taxPercent'] : null,
            isset($d['freeOfChargeAmount']) ? (int) $d['freeOfChargeAmount'] : null,
        );
    }
}
