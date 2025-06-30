<?php

namespace IikoApi\Domain\Dto\Responses\CreateDelivery;

final readonly class CreateDeliveryResponse
{
    public function __construct(
        public string $correlationId,
        public OrderInfo $orderInfo,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            correlationId: $d['correlationId'],
            orderInfo: OrderInfo::fromArray($d['orderInfo']),
        );
    }
}
