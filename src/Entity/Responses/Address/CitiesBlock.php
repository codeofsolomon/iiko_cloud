<?php

namespace IikoApi\Entity\Responses\Address;

final readonly class CitiesBlock
{
    public function __construct(
        public string $organizationId,
        public array  $items,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['organizationId'],
            array_map([City::class, 'fromArray'], $d['items'] ?? []),
        );
    }
}