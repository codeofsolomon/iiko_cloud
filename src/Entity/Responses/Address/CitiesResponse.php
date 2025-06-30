<?php

namespace IikoApi\Entity\Responses\Address;

final readonly class CitiesResponse
{
    public function __construct(
        public string $correlationId,
        public array $cities,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['correlationId'],
            array_map([CitiesBlock::class, 'fromArray'], $d['cities'] ?? []),
        );
    }
}
