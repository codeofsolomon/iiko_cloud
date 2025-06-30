<?php

namespace IikoApi\Entity\Responses\Discount;

final readonly class Coupon
{
    public function __construct(
        public string $id,
        public ?string $number,
        public ?string $seriesName,
        public ?string $seriesId,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'],
            $d['number'],
            $d['seriesName'],
            $d['seriesId'],
        );
    }
}
