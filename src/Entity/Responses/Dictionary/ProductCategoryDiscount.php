<?php

namespace IikoApi\Entity\Responses\Dictionary;

final readonly class ProductCategoryDiscount
{
    public function __construct(
        public string $categoryId,
        public ?string $categoryName,
        public string  $percent,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            categoryId: $d['categoryId'],
            categoryName: $d['categoryName'] ?? null,
            percent: $d['percent']
        );
    }
}