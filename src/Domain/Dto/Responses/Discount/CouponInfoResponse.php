<?php

namespace IikoApi\Domain\Dto\Responses\Discount;

final readonly class CouponInfoResponse
{
    public function __construct(
        public array $couponInfo,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            array_map([CouponInfo::class, 'fromArray'], $d['couponInfo'] ?? []),
        );
    }
}
