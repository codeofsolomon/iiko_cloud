<?php

namespace IikoApi\Entity\Responses\CreateDelivery;

use DateTimeImmutable;
use IikoApi\Domain\Enums\OrderItemStatus;

final readonly class CompoundOrderItem extends OrderItem
{
    /** @param OrderItemModifier[]|null $commonModifiers */
    public function __construct(
        string $type,
        OrderItemStatus $status,
        ?ItemDeletedInfo $deleted,
        float $amount,
        ?string $comment,
        ?DateTimeImmutable $whenPrinted,
        ?ProductSize $size,
        ?ComboItemInformation $comboInformation,
        public CompoundOrderItemComponent $primaryComponent,
        public ?CompoundOrderItemComponent $secondaryComponent,
        public ?array $commonModifiers,
        public ?CompoundItemTemplate $template,
    ) {
        parent::__construct(...func_get_args());
    }

    public static function fromArray(array $d): self
    {
        [$type, $status, $deleted, $amount, $comment,
            $whenPrinted, $size, $comboInfo] = parent::baseFromArray($d);

        return new self(
            $type, $status, $deleted, $amount, $comment, $whenPrinted, $size, $comboInfo,
            CompoundOrderItemComponent::fromArray($d['primaryComponent']),
            isset($d['secondaryComponent']) ? CompoundOrderItemComponent::fromArray($d['secondaryComponent']) : null,
            isset($d['commonModifiers']) ? array_map(OrderItemModifier::fromArray(...), $d['commonModifiers']) : null,
            isset($d['template']) ? CompoundItemTemplate::fromArray($d['template']) : null,
        );
    }
}
