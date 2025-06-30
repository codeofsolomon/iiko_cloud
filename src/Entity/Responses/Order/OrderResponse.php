<?php

namespace IikoApi\Entity\Responses\Order;

final readonly class OrderResponse
{
    public function __construct(
        public string    $correlationId,
        public OrderInfo $orderInfo,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            correlationId: $d['correlationId'],
            orderInfo:     OrderInfo::fromArray($d['orderInfo']),
        );
    }
}