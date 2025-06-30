<?php

namespace IikoApi\Domain\Dto\Responses\CreateDelivery;

final readonly class RemovalType
{
    public function __construct(
        public string $id,
        public string $name,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self($d['id'], $d['name']);
    }
}
