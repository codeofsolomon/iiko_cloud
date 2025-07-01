<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Address;

final readonly class StreetClassfieirResponse
{
    public function __construct(
        public string $correlationId,
        public array $streets,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['correlationId'],
            array_map([StreetClassifier::class, 'fromArray'], $d['streets'] ?? []),
        );
    }
}
