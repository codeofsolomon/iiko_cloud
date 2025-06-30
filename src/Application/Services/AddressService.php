<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Entity\Requests\Address\CitiesRequest;
use IikoApi\Entity\Requests\Address\RegionsRequest;
use IikoApi\Entity\Requests\Address\StreetsByCityRequest;
use IikoApi\Entity\Requests\Address\StreetsByIdRequest;
use IikoApi\Entity\Responses\Address\CitiesResponse;
use IikoApi\Entity\Responses\Address\RegionsResponse;
use IikoApi\Entity\Responses\Address\StreetClassfieirResponse;
use IikoApi\Entity\Responses\Address\StreetsByCityResponse;

final class AddressService extends BaseService
{
    public function getRegions(RegionsRequest $request): RegionsResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::REGIONS,
            $request->prepareRequest(),
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
            $request->prepareRequest(),
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
            $request->prepareRequest(),
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
            $request->prepareRequest(),
        );

        return StreetClassfieirResponse::fromArray($response);
    }
}
