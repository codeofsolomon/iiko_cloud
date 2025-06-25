<?php

namespace IikoApi\Entity\Responses\Address;


final readonly class StreetClassfieirResponse
{
    public function __construct(
        public string $correlationId,
        public array  $streets,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['correlationId'],
            array_map([StreetClassfieir::class, 'fromArray'], $d['streets'] ?? []),
        );
    }
}