<?php

namespace IikoApi;

use IikoApi\Application\Contracts\Http\ApiClientInterface;
use IikoApi\Application\Services;
use IikoApi\Infrastructure\Auth\TokenAuthenticator;

class IikoApiClient
{
    public function __construct(
        protected ApiClientInterface $apiClient,
        protected TokenAuthenticator $authenticator
    ) {}

    public function address(): Services\AddressService
    {
        return new Services\AddressService($this->apiClient, $this->authenticator);
    }

    public function organizations(): Services\OrganizationService
    {
        return new Services\OrganizationService($this->apiClient, $this->authenticator);
    }

    public function menu(): Services\MenuService
    {
        return new Services\MenuService($this->apiClient, $this->authenticator);
    }

    public function dictionary(): Services\DictionaryService
    {
        return new Services\DictionaryService($this->apiClient, $this->authenticator);
    }

    public function delivery(): Services\DeliveryService
    {
        return new Services\DeliveryService($this->apiClient, $this->authenticator);
    }

    public function customer(): Services\CustomerService
    {
        return new Services\CustomerService($this->apiClient, $this->authenticator);
    }

    public function customerCategory(): Services\CustomerCategoryService
    {
        return new Services\CustomerCategoryService($this->apiClient, $this->authenticator);
    }

    public function discount(): Services\DiscountService
    {
        return new Services\DiscountService($this->apiClient, $this->authenticator);
    }

    public function webhook(): Services\WebhookService
    {
        return new Services\WebhookService($this->apiClient, $this->authenticator);
    }

    public function order(): Services\OrderService
    {
        return new Services\OrderService($this->apiClient, $this->authenticator);
    }
}
