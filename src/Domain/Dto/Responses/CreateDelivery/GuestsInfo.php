<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\CreateDelivery;

final readonly class GuestsInfo
{
    public function __construct(
        public int $count,
        public bool $splitBetweenPersons,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(count: $d['count'], splitBetweenPersons: $d['splitBetweenPersons']);
    }
}
