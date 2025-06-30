<?php

namespace IikoApi\Application\Services;

use IikoApi\Application\Contracts\Http\ApiClientInterface;
use IikoApi\Constants;
use IikoApi\Entity\Requests\Customer\CustomerCreateOrUpdateRequest;
use IikoApi\Entity\Requests\Customer\CustomerInfoRequest;
use IikoApi\Entity\Responses\Customer\CreateOrUpdateCustomerResponse;
use IikoApi\Entity\Responses\Customer\Customer;
use IikoApi\Infrastructure\Auth\TokenAuthenticator;

class CustomerService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    /**
     * Summary of getCustomer
     */
    public function getCustomer(CustomerInfoRequest $request): Customer
    {
        $response = $this->client->request(
            'POST',
            Constants::CUSTOMER_INFO,
            $request->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return Customer::fromArray($response);
    }

    /**
     * Summary of createOrUpdateCustomer
     */
    public function createOrUpdateCustomer(CustomerCreateOrUpdateRequest $request): CreateOrUpdateCustomerResponse
    {
        $response = $this->client->request(
            'POST',
            Constants::CUSTOMER_CREATE_OR_UPDATE,
            $request->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return CreateOrUpdateCustomerResponse::fromArray($response);
    }
}
