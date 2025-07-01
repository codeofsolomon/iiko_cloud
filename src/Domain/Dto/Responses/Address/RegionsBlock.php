<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Address;

final readonly class RegionsBlock
{
    public function __construct(
        public string $organizationId,
        public array $items,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['organizationId'],
            array_map([Region::class, 'fromArray'], $d['items'] ?? []),
        );
    }
}
