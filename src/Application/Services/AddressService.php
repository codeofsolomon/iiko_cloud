<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Domain\Dto\Requests\Address\CitiesRequest;
use IikoApi\Domain\Dto\Requests\Address\RegionsRequest;
use IikoApi\Domain\Dto\Requests\Address\StreetsByCityRequest;
use IikoApi\Domain\Dto\Requests\Address\StreetsByIdRequest;
use IikoApi\Domain\Dto\Responses\Address\CitiesResponse;
use IikoApi\Domain\Dto\Responses\Address\RegionsResponse;
use IikoApi\Domain\Dto\Responses\Address\StreetClassfieirResponse;
use IikoApi\Domain\Dto\Responses\Address\StreetsByCityResponse;

final class AddressService extends BaseService
{
    public function getRegions(RegionsRequest $request): RegionsResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::REGIONS,
            $request->toArray(),
        );

        return RegionsResponse::fromArray($response);
    }

    /**
     * Summary of getCities
     */
    public function getCities(CitiesRequest $request): CitiesResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::CITY,
            $request->toArray(),
        );

        return CitiesResponse::fromArray($response);
    }

    /**
     * Summary of getStreetsByCity
     */
    public function getStreetsByCity(StreetsByCityRequest $request): StreetsByCityResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::STREETS_BY_CITY,
            $request->toArray(),
        );

        return StreetsByCityResponse::fromArray($response);
    }

    /**
     * Summary of getStreetsByID
     */
    public function getStreetsByID(StreetsByIdRequest $request): StreetClassfieirResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::STREETS_BY_ID_OR_CLASSIFIERLD,
            $request->toArray(),
        );

        return StreetClassfieirResponse::fromArray($response);
    }
}
