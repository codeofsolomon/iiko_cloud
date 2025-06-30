<?php

namespace IikoApi\Entity\Responses\Address;

final readonly class City
{
    public function __construct(
        public string $id,
        public string $name,
        public string $regionId,        // ← принадлежность региону
        public ?int $externalRevision,
        public bool $isDeleted,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'],
            $d['name'],
            $d['regionId'],
            (int) $d['externalRevision'] ?? null,
            (bool) $d['isDeleted'],
        );
    }
}
