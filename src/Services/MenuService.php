<?php

namespace IikoApi\Services;

use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;


class MenuService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    public function getMenu( $request)
    {
        // $token = $this->auth->getToken();

        // $response = $this->client->request(
        //     'POST',
        //     '/api/1/nomenclature',
        //     $request->prepareRequest(),
        //     ['Authorization' => "Bearer $token"]
        // );

        // return new Menu($response);
    }
}
