<?php

namespace IikoApi\Domain\Dto\Responses\Discount;

final readonly class CouponInfo
{
    public function __construct(
        public string $id,
        public ?string $number,
        public ?string $seriesName,
        public ?string $seriesId,
        public ?string $whenActivated,
        public bool $isDeleted,

    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'],
            $d['number'],
            $d['seriesName'],
            $d['seriesId'],
            $d['whenActivated'],
            (bool) $d['isDeleted'],
        );
    }
}
