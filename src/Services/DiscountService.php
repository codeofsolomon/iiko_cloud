<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\Http\ApiClientInterface;
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
use IikoApi\Infrastructure\Auth\TokenAuthenticator;

class DiscountService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    /**
     * Summary of getNonActivedCoupons
     */
    public function getNonActivedCoupons(GetNonActivatedCouponsRequest $filter): CouponsBySeriesResponse
    {
        $response = $this->client->request(
            'POST',
            Constants::NON_ACTIVATED_COUPON,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return CouponsBySeriesResponse::fromArray($response);
    }

    /**
     * Summary of getNonActivedCouponSeries
     */
    public function getNonActivedCouponSeries(GetCouponSeriesRequest $filter): CouponSeriesResponse
    {
        $response = $this->client->request(
            'POST',
            Constants::NON_ACTIVATED_SERIES,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return CouponSeriesResponse::fromArray($response);
    }

    /**
     * Summary of getCouponInfo
     */
    public function getCouponInfo(GetCouponRequest $filter): CouponInfoResponse
    {
        $response = $this->client->request(
            'POST',
            Constants::COUPON_INFO,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return CouponInfoResponse::fromArray($response);
    }

    /**
     * Summary of getPrograms
     */
    public function getPrograms(ProgramsRequest $filter): ProgramsResponse
    {
        $response = $this->client->request(
            'POST',
            Constants::PROGRAM,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return ProgramsResponse::fromArray($response);
    }

    /**
     * Summary of calculate
     */
    public function calculate(Request $request): LoyaltyCalculationResponse
    {
        $response = $this->client->request(
            'POST',
            Constants::LOYALTY_CALCULATE,
            $request->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return LoyaltyCalculationResponse::fromArray($response);
    }
}
