<?php

namespace Src\Entity\Responses\CreateDelivery;

final readonly class ProductGroup
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
