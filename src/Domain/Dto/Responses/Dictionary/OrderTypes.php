<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Dictionary;

/** @property OrderType[] $orderTypes */
final readonly class OrderTypes
{
    public function __construct(
        public string $correlationId,
        public array $orderTypes,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            correlationId: $d['correlationId'],
            orderTypes: array_map(
                OrderType::class.'::fromArray',
                $d['orderTypes'] ?? []
            ),
        );
    }
}
