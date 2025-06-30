<?php

namespace IikoApi\Application\Services;

use IikoApi\Application\Contracts\Http\ApiClientInterface;
use IikoApi\Constants;
use IikoApi\Entity\Requests\Address\CitiesRequest;
use IikoApi\Entity\Requests\Address\RegionsRequest;
use IikoApi\Entity\Requests\Address\StreetsByCityRequest;
use IikoApi\Entity\Requests\Address\StreetsByIdRequest;
use IikoApi\Entity\Responses\Address\CitiesResponse;
use IikoApi\Entity\Responses\Address\RegionsResponse;
use IikoApi\Entity\Responses\Address\StreetClassfieirResponse;
use IikoApi\Entity\Responses\Address\StreetsByCityResponse;
use IikoApi\Infrastructure\Auth\TokenAuthenticator;

class AddressService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    /**
     * Summary of getRegions
     */
    public function getRegions(RegionsRequest $request): RegionsResponse
    {
        $response = $this->client->request(
            'POST',
            Constants::REGIONS,
            $request->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return RegionsResponse::fromArray($response);
    }

    /**
     * Summary of getCities
     */
    public function getCities(CitiesRequest $request): CitiesResponse
    {
        $response = $this->client->request(
            'POST',
            Constants::CITY,
            $request->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return CitiesResponse::fromArray($response);
    }

    /**
     * Summary of getStreetsByCity
     */
    public function getStreetsByCity(StreetsByCityRequest $request): StreetsByCityResponse
    {
        $response = $this->client->request(
            'POST',
            Constants::STREETS_BY_CITY,
            $request->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return StreetsByCityResponse::fromArray($response);
    }

    /**
     * Summary of getStreetsByID
     */
    public function getStreetsByID(StreetsByIdRequest $request): StreetClassfieirResponse
    {
        $response = $this->client->request(
            'POST',
            Constants::STREETS_BY_ID_OR_CLASSIFIERLD,
            $request->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return StreetClassfieirResponse::fromArray($response);
    }
}
