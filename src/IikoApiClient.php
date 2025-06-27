<?php

namespace IikoApi;


use IikoApi\Services\AddressService;
use IikoApi\Services\CustomerCategoryService;
use IikoApi\Services\CustomerService;
use IikoApi\Services\DeliveryService;
use IikoApi\Services\DictionaryService;
use IikoApi\Services\DiscountService;
use IikoApi\Services\MenuService;
use IikoApi\Services\OrganizationService;
use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;
use IikoApi\Services\WebhookService;

class IikoApiClient
{
    public function __construct(
        protected ApiClientInterface $apiClient,
        protected TokenAuthenticator $authenticator
    ) {}

    public function address(): AddressService
    {
        return new AddressService($this->apiClient, $this->authenticator);
    }

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

    public function customer(): CustomerService
    {
        return new CustomerService($this->apiClient, $this->authenticator);
    }

    public function customerCategory(): CustomerCategoryService
    {
        return new CustomerCategoryService($this->apiClient, $this->authenticator);
    }

    public function discount(): DiscountService
    {
        return new DiscountService($this->apiClient, $this->authenticator);
    }


    public function webhook(): WebhookService
    {
        return new WebhookService($this->apiClient, $this->authenticator);
    }
}