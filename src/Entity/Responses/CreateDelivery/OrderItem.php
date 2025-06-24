<?php

namespace Src\Entity\Responses\CreateDelivery;


final readonly class OrderItem
{
    /** @param OrderModifier[] $modifiers */
    public function __construct(
        public string        $id,
        public string        $productId,
        public string        $name,
        public string        $code,
        public float         $amount,
        public float         $price,
        public float         $sum,
        public OrderItemType $type,
        public ?string       $comment = null,
        public array         $modifiers = [],
        public ?string       $positionId = null,
        public ?string       $comboInformation = null,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id:        $d['id'],
            productId: $d['productId'],
            name:      $d['name'],
            code:      $d['code'],
            amount:    (float) $d['amount'],
            price:     (float) $d['price'],
            sum:       (float) $d['sum'],
            type:      OrderItemType::from($d['type']),
            comment:   $d['comment'] ?? null,
            modifiers: array_map(OrderModifier::class.'::fromArray', $d['modifiers'] ?? []),
            positionId:        $d['positionId']        ?? null,
            comboInformation:  $d['comboInformation']  ?? null,
        );
    }
}