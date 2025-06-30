<?php

namespace IikoApi\Domain\Dto\Responses\CreateDelivery;

final readonly class Conception
{
    public function __construct(
        public string $id,
        public string $name,
        public string $code,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(id: $d['id'], name: $d['name'], code: $d['code']);
    }
}
