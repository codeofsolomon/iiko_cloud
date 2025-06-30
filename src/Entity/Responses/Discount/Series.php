<?php

namespace IikoApi\Entity\Responses\Discount;

final readonly class Series
{
    public function __construct(
        public string $id,
        public string $number,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'],
            $d['number'],
        );
    }
}
