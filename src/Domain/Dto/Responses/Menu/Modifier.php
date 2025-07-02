<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Menu;

final readonly class Modifier
{
    public function __construct(
        public string $id,
        public ?int $defaultAmount,
        public int $minAmount,
        public int $maxAmount,
        public ?bool $required,
        public ?bool $hideIfDefaultAmount,
        public ?bool $splittable,
        public ?int $freeOfChargeAmount,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            defaultAmount: (int) $data['defaultAmount'] ?? null,
            minAmount: (int) $data['minAmount'],
            maxAmount: (int) $data['maxAmount'],
            required: (bool) $data['required'] ?? null,
            hideIfDefaultAmount: (bool) $data['hideIfDefaultAmount'] ?? null,
            splittable: (bool) $data['splittable'] ?? null,
            freeOfChargeAmount: (int) $data['freeOfChargeAmount'] ?? null,
        );
    }
}
