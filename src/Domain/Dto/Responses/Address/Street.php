<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Address;

final readonly class Street
{
    public function __construct(
        public string $id,
        public string $name,
        public ?int $externalRevision,
        public bool $isDeleted,
        public ?string $classifierId,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'],
            $d['name'],
            isset($d['externalRevision']) ? (int) $d['externalRevision'] : null,
            (bool) $d['isDeleted'],
            $d['classifierId'] ?? null,
        );
    }
}
