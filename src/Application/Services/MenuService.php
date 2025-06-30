<?php

namespace IikoApi\Application\Services;

use IikoApi\Application\Contracts\Http\ApiClientInterface;
use IikoApi\Constants;
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
