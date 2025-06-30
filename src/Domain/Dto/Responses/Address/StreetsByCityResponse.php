<?php

namespace IikoApi\Domain\Dto\Responses\Address;

final readonly class StreetsByCityResponse
{
    public function __construct(
        public string $correlationId,
        public array $streets,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['correlationId'],
            array_map([Street::class, 'fromArray'], $d['streets'] ?? []),
        );
    }
}
