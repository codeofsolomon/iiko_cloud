<?php

namespace IikoApi\Domain\Dto\Responses\Menu;

final readonly class SizePrice
{
    public function __construct(
        public string $sizeId,
        public Price $price,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            sizeId: (string) $data['sizeId'],
            price: Price::fromArray($data['price']),
        );
    }
}
