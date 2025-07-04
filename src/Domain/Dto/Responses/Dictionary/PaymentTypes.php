<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Dictionary;

/** @property PaymentType[] $paymentTypes */
final readonly class PaymentTypes
{
    public function __construct(
        public string $correlationId,
        public array $paymentTypes,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            correlationId: $d['correlationId'],
            paymentTypes: array_map(
                PaymentType::class.'::fromArray',
                $d['paymentTypes'] ?? []
            ),
        );
    }
}
