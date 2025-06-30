<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Entity\Requests\Customer\CustomerCreateOrUpdateRequest;
use IikoApi\Entity\Requests\Customer\CustomerInfoRequest;
use IikoApi\Entity\Responses\Customer\CreateOrUpdateCustomerResponse;
use IikoApi\Entity\Responses\Customer\Customer;

final class CustomerService extends BaseService
{
    /**
     * Summary of getCustomer
     */
    public function getCustomer(CustomerInfoRequest $request): Customer
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::CUSTOMER_INFO,
            $request->prepareRequest(),
        );

        return Customer::fromArray($response);
    }

    /**
     * Summary of createOrUpdateCustomer
     */
    public function createOrUpdateCustomer(CustomerCreateOrUpdateRequest $request): CreateOrUpdateCustomerResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::CUSTOMER_CREATE_OR_UPDATE,
            $request->prepareRequest(),
        );

        return CreateOrUpdateCustomerResponse::fromArray($response);
    }
}
