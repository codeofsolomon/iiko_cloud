<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Menu;

final readonly class Size
{
    public function __construct(
        public string $id,
        public string $name,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
        );
    }
}
