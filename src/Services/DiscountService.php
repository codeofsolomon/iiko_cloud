<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;
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

class DiscountService
{
     public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}


     /**
      * Summary of getNonActivedCoupons
      * @param \IikoApi\Entity\Requests\Discount\GetNonActivatedCouponsRequest $filter
      * @return CouponsBySeriesResponse
      */
    public function getNonActivedCoupons(GetNonActivatedCouponsRequest $filter): CouponsBySeriesResponse
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::NON_ACTIVATED_COUPON,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return CouponsBySeriesResponse::fromArray($response);
    }

    /**
     * Summary of getNonActivedCouponSeries
     * @param \IikoApi\Entity\Requests\Discount\GetCouponSeriesRequest $filter
     * @return CouponSeriesResponse
     */
    public function getNonActivedCouponSeries(GetCouponSeriesRequest $filter): CouponSeriesResponse
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::NON_ACTIVATED_SERIES,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return CouponSeriesResponse::fromArray($response);
    }


    /**
     * Summary of getCouponInfo
     * @param \IikoApi\Entity\Requests\Discount\GetCouponRequest $filter
     * @return CouponInfoResponse
     */
    public function getCouponInfo(GetCouponRequest $filter): CouponInfoResponse
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::COUPON_INFO,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return CouponInfoResponse::fromArray($response);
    }


    /**
     * Summary of getPrograms
     * @param \IikoApi\Entity\Requests\Discount\ProgramsRequest $filter
     * @return ProgramsResponse
     */
    public function getPrograms(ProgramsRequest $filter): ProgramsResponse
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::PROGRAM,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return ProgramsResponse::fromArray($response);
    }


    /**
     * Summary of calculate
     * @param \IikoApi\Entity\Requests\LoyaltyCalculate\Request $request
     * @return LoyaltyCalculationResponse
     */
    public function calculate(Request $request): LoyaltyCalculationResponse
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::LOYALTY_CALCULATE,
            $request->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return LoyaltyCalculationResponse::fromArray($response);
    }

}