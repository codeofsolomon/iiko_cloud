<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Discount;

final readonly class CouponSeriesResponse
{
    public function __construct(
        public array $seriesWithNotActivatedCoupons,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            array_map([Series::class, 'fromArray'], $d['seriesWithNotActivatedCoupons'] ?? []),
        );
    }
}
