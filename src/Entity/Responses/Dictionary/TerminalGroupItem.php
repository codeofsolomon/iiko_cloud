<?php

namespace IikoApi\Entity\Responses\Dictionary;

final readonly class TerminalGroupItem
{
    public function __construct(
        public string $id,
        public string $organizationId,
        public string $name,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id: $d['id'],
            organizationId: $d['organizationId'],
            name: $d['name'],
        );
    }
}
