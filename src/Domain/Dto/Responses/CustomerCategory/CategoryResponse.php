<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\CustomerCategory;

final readonly class CategoryResponse
{
    public function __construct(
        public array $guestCategories,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            array_map([Category::class, 'fromArray'], $d['guestCategories'] ?? []),
        );
    }
}
