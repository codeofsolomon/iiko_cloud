<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Address;

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
