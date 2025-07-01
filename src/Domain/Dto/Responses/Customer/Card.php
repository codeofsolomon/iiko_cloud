<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Customer;

final readonly class Card
{
    public function __construct(
        public string $id,
        public string $track,
        public string $number,
        public ?string $validToDate,  // YYYY-MM-DD
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'], $d['track'], $d['number'], $d['validToDate'] ?? null
        );
    }
}
