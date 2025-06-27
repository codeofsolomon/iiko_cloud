<?php

namespace IikoApi\Entity\Responses\LoyaltyCalculation;

final readonly class FreeProduct
{
    /** @param SizeRef[] $sizes */
    public function __construct(
        public ?string    $id,
        public ?string    $code,
        public ?array    $size,    // массив строк или null
        public array     $sizes,
    ) {}
    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'] ?? null,
            $d['code'] ?? null,
            $d['size'] ?? null,
            array_map([SizeRef::class,'fromArray'], $d['sizes'] ?? []),
        );
    }
}