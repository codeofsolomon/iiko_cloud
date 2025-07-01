<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\CreateDelivery;

use IikoApi\Domain\Enums\PaymentTypeKind;

final readonly class PaymentType
{
    public function __construct(
        public string $id,
        public string $name,
        public PaymentTypeKind $kind,

    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id: $d['id'],
            name: $d['name'],
            kind: PaymentTypeKind::from($d['kind']),

        );
    }
}
