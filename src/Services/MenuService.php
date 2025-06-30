<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\Http\ApiClientInterface;
use IikoApi\Entity\Requests\Menu\MenuRequest;
use IikoApi\Entity\Responses\Menu\Nomenclature;
use IikoApi\Infrastructure\Auth\TokenAuthenticator;

class MenuService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    public function getMenu(MenuRequest $filter): Nomenclature
    {
        $response = $this->client->request(
            'POST',
            Constants::NOMENCLATURE_URL,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return Nomenclature::fromArray($response);
    }
}
