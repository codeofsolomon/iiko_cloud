<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Domain\Dto\Requests\Discount\GetCouponRequest;
use IikoApi\Domain\Dto\Requests\Discount\GetCouponSeriesRequest;
use IikoApi\Domain\Dto\Requests\Discount\GetNonActivatedCouponsRequest;
use IikoApi\Domain\Dto\Requests\Discount\ProgramsRequest;
use IikoApi\Domain\Dto\Requests\LoyaltyCalculate\Request;
use IikoApi\Domain\Dto\Responses\Discount\CouponInfoResponse;
use IikoApi\Domain\Dto\Responses\Discount\CouponsBySeriesResponse;
use IikoApi\Domain\Dto\Responses\Discount\CouponSeriesResponse;
use IikoApi\Domain\Dto\Responses\Discount\ProgramsResponse;
use IikoApi\Domain\Dto\Responses\LoyaltyCalculation\LoyaltyCalculationResponse;

final class DiscountService extends BaseService
{
    /**
     * Summary of getNonActivedCoupons
     */
    public function getNonActivedCoupons(GetNonActivatedCouponsRequest $filter): CouponsBySeriesResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::NON_ACTIVATED_COUPON,
            $filter->toArray(),
        );

        return CouponsBySeriesResponse::fromArray($response);
    }

    /**
     * Summary of getNonActivedCouponSeries
     */
    public function getNonActivedCouponSeries(GetCouponSeriesRequest $filter): CouponSeriesResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::NON_ACTIVATED_SERIES,
            $filter->toArray(),
        );

        return CouponSeriesResponse::fromArray($response);
    }

    /**
     * Summary of getCouponInfo
     */
    public function getCouponInfo(GetCouponRequest $filter): CouponInfoResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::COUPON_INFO,
            $filter->toArray(),
        );

        return CouponInfoResponse::fromArray($response);
    }

    /**
     * Summary of getPrograms
     */
    public function getPrograms(ProgramsRequest $filter): ProgramsResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::PROGRAM,
            $filter->toArray(),
        );

        return ProgramsResponse::fromArray($response);
    }

    /**
     * Summary of calculate
     */
    public function calculate(Request $request): LoyaltyCalculationResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::LOYALTY_CALCULATE,
            $request->toArray(),
        );

        return LoyaltyCalculationResponse::fromArray($response);
    }
}
