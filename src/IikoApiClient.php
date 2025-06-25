<?php

namespace IikoApi;


use IikoApi\Services\DeliveryService;
use IikoApi\Services\DictionaryService;
use IikoApi\Services\MenuService;
use IikoApi\Services\OrganizationService;
use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;

class IikoApiClient
{
    public function __construct(
        protected ApiClientInterface $apiClient,
        protected TokenAuthenticator $authenticator
    ) {}

    public function organizations(): OrganizationService
    {
        return new OrganizationService($this->apiClient, $this->authenticator);
    }

    public function menu(): MenuService
    {
        return new MenuService($this->apiClient, $this->authenticator);
    }

    public function dictionary(): DictionaryService
    {
        return new DictionaryService($this->apiClient, $this->authenticator);
    }


    public function delivery(): DeliveryService
    {
        return new DeliveryService($this->apiClient, $this->authenticator);
    }
}