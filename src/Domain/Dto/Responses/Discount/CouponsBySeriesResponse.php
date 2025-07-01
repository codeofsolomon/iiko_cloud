<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Discount;

final readonly class CouponsBySeriesResponse
{
    public function __construct(
        public array $notActivatedCoupon,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            array_map([Coupon::class, 'fromArray'], $d['notActivatedCoupon'] ?? []),
        );
    }
}
