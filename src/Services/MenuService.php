<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;
use Src\Entity\Requests\Menu\MenuRequest;
use Src\Entity\Responses\Menu\Nomenclature;


class MenuService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    public function getMenu(MenuRequest $filter): Nomenclature
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::NOMENCLATURE_URL,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return Nomenclature::fromArray($response);
    }
}
