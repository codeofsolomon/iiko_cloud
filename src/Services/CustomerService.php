<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;
use IikoApi\Entity\Requests\Customer\CustomerInfoRequest;
use IikoApi\Entity\Responses\Customer\Customer;

class CustomerService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}


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

}