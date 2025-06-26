<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;
use IikoApi\Entity\Requests\Customer\CustomerCreateOrUpdateRequest;
use IikoApi\Entity\Requests\Customer\CustomerInfoRequest;
use IikoApi\Entity\Responses\Customer\CreateOrUpdateCustomerResponse;
use IikoApi\Entity\Responses\Customer\Customer;

class CustomerService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}


    /**
     * Summary of getCustomer
     * @param \IikoApi\Entity\Requests\Customer\CustomerInfoRequest $request
     * @return Customer
     */
    public function getCustomer(CustomerInfoRequest $request): Customer
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::CUSTOMER_INFO,
            $request->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return Customer::fromArray($response);
    }

    /**
     * Summary of createOrUpdateCustomer
     * @param \IikoApi\Entity\Requests\Customer\CustomerCreateOrUpdateRequest $request
     * @return CreateOrUpdateCustomerResponse
     */
    public function createOrUpdateCustomer(CustomerCreateOrUpdateRequest $request): CreateOrUpdateCustomerResponse
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::CUSTOMER_CREATE_OR_UPDATE,
            $request->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return CreateOrUpdateCustomerResponse::fromArray($response);
    }

}