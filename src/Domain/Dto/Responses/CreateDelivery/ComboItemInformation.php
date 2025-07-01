<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\CreateDelivery;

final readonly class ComboItemInformation
{
    public function __construct(
        public string $comboId,
        public string $comboSourceId,
        public string $groupId,
        public ?string $groupName,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self($d['comboId'], $d['comboSourceId'], $d['groupId'], $d['groupName'] ?? null);
    }
}
