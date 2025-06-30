<?php

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Entity\Requests\Discount\GetCouponRequest;
use IikoApi\Entity\Requests\Discount\GetCouponSeriesRequest;
use IikoApi\Entity\Requests\Discount\GetNonActivatedCouponsRequest;
use IikoApi\Entity\Requests\Discount\ProgramsRequest;
use IikoApi\Entity\Requests\LoyaltyCalculate\Request;
use IikoApi\Entity\Responses\Discount\CouponInfoResponse;
use IikoApi\Entity\Responses\Discount\CouponsBySeriesResponse;
use IikoApi\Entity\Responses\Discount\CouponSeriesResponse;
use IikoApi\Entity\Responses\Discount\ProgramsResponse;
use IikoApi\Entity\Responses\LoyaltyCalculation\LoyaltyCalculationResponse;

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
            $filter->prepareRequest(),
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
            $filter->prepareRequest(),
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
            $filter->prepareRequest(),
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
            $filter->prepareRequest(),
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
            $request->prepareRequest(),
        );

        return LoyaltyCalculationResponse::fromArray($response);
    }
}
