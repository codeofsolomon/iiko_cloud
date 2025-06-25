<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;
use IikoApi\Entity\Requests\Address\CitiesRequest;
use IikoApi\Entity\Requests\Address\RegionsRequest;
use IikoApi\Entity\Responses\Address\CitiesResponse;
use IikoApi\Entity\Responses\Address\RegionsResponse;

class AddressService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}



    /**
     * Summary of getRegions
     * @param \IikoApi\Entity\Requests\Address\RegionsRequest $request
     * @return RegionsResponse
     */
    public function getRegions(RegionsRequest $request): RegionsResponse
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::REGIONS,
            $request->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return RegionsResponse::fromArray($response);
    }


    /**
     * Summary of getCities
     * @param \IikoApi\Entity\Requests\Address\CitiesRequest $request
     * @return CitiesResponse
     */
    public function getCities(CitiesRequest $request): CitiesResponse
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::CITY,
            $request->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return CitiesResponse::fromArray($response);
    }
}