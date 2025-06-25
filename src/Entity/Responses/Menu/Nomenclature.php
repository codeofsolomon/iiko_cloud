<?php

namespace IikoApi\Entity\Responses\Menu;

final readonly class Nomenclature
{
    /** @param Group[]            $groups
     *  @param ProductCategory[]  $productCategories
     *  @param Product[]          $products
     *  @param Size[]             $sizes
     */
    public function __construct(
        public string $correlationId,
        public array  $groups,
        public array  $productCategories,
        public array  $products,
        public array  $sizes,
        public int    $revision,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            correlationId: $data['correlationId'],
            groups:        array_map(Group::class.'::fromArray', $data['groups'] ?? []),
            productCategories: array_map(
                ProductCategory::class.'::fromArray',
                $data['productCategories'] ?? []
            ),
            products: array_map(Product::class.'::fromArray', $data['products'] ?? []),
            sizes:    array_map(Size::class.'::fromArray', $data['sizes'] ?? []),
            revision: (int) $data['revision'],
        );
    }
}