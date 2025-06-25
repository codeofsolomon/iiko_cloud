<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;
use IikoApi\Entity\Requests\Address\RegionsRequest;
use IikoApi\Entity\Responses\Address\RegionsResponse;

class AddressService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}



    public function createDelivery(RegionsRequest $request): RegionsResponse
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
}