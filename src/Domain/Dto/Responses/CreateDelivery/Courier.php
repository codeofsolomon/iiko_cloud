<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\CreateDelivery;

final readonly class Courier
{
    public function __construct(
        public string $id,
        public string $name,
        public ?string $phone,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id: $d['id'],
            name: $d['name'],
            phone: $d['phone'],
        );
    }
}
