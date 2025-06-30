<?php

namespace IikoApi\Domain\Dto\Responses\LoyaltyCalculation;

final readonly class Upsale
{
    /** @param string[]      $productCodes
     *  @param ProductRef[]  $products */
    public function __construct(
        public string $sourceActionId,
        public string $descriptionForUser,
        public array $productCodes,
        public array $products,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['sourceActionId'],
            $d['descriptionForUser'],
            $d['productCodes'] ?? [],
            array_map([ProductRef::class, 'fromArray'], $d['products'] ?? []),
        );
    }
}
