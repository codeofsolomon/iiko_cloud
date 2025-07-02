<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Dictionary;

final readonly class ProductCategoryDiscount
{
    public function __construct(
        public string $categoryId,
        public ?string $categoryName,
        public float $percent,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            categoryId: $d['categoryId'],
            categoryName: $d['categoryName'] ?? null,
            percent: (float) $d['percent']
        );
    }
}
