<?php

namespace IikoApi\Domain\Dto\Responses\Menu;

final readonly class ProductCategory
{
    public function __construct(
        public string $id,
        public string $name,
        public ?string $description,
        public bool $isDeleted = false,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            description: $data['description'] ?? null,
            isDeleted: (bool) ($data['isDeleted'] ?? false),
        );
    }
}
