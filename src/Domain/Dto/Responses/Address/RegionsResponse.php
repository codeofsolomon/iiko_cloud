<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Address;

final readonly class RegionsResponse
{
    public function __construct(
        public string $correlationId,
        public array $regions,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['correlationId'],
            array_map([RegionsBlock::class, 'fromArray'], $d['regions'] ?? []),
        );
    }
}
