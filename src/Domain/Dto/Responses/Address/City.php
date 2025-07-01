<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Address;

final readonly class City
{
    public function __construct(
        public string $id,
        public string $name,
        public string $regionId,
        public ?int $externalRevision,
        public bool $isDeleted,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'],
            $d['name'],
            $d['regionId'],
            isset($d['externalRevision']) ? (int) $d['externalRevision'] : null,
            (bool) $d['isDeleted'],
        );
    }
}
