<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\CreateDelivery;

use DateTimeImmutable;
use IikoApi\Domain\Enums\OrderItemStatus;

abstract readonly class OrderItem
{
    public function __construct(
        public string $type,
        public OrderItemStatus $status,
        public ?ItemDeletedInfo $deleted,
        public float $amount,
        public ?string $comment,
        public ?DateTimeImmutable $whenPrinted,
        public ?ProductSize $size,
        public ?ComboItemInformation $comboInformation,
    ) {}

    /** @internal */
    protected static function baseFromArray(array $d): array
    {
        return [
            $d['type'],
            OrderItemStatus::from($d['status']),
            isset($d['deleted']) ? ItemDeletedInfo::fromArray($d['deleted']) : null,
            (float) $d['amount'],
            $d['comment'] ?? null,
            isset($d['whenPrinted']) ? new DateTimeImmutable($d['whenPrinted']) : null,
            isset($d['size']) ? ProductSize::fromArray($d['size']) : null,
            isset($d['comboInformation']) ? ComboItemInformation::fromArray($d['comboInformation']) : null,
        ];
    }

    /**
     * Фабрика, которая сама решит, какой дочерний класс вернуть
     */
    public static function fromArray(array $d): self
    {
        return match ($d['type']) {
            'Product' => ProductOrderItem::fromArray($d),
            'Compound' => CompoundOrderItem::fromArray($d),
            'Service' => ServiceOrderItem::fromArray($d),
            default => throw new \UnexpectedValueException("Unknown OrderItem.type = {$d['type']}"),
        };
    }
}
