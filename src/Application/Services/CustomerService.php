<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Domain\Dto\Requests\Customer\CustomerCreateOrUpdateRequest;
use IikoApi\Domain\Dto\Requests\Customer\CustomerInfoRequest;
use IikoApi\Domain\Dto\Responses\Customer\CreateOrUpdateCustomerResponse;
use IikoApi\Domain\Dto\Responses\Customer\Customer;

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
            $request->toArray(),
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
            $request->toArray(),
        );

        return CreateOrUpdateCustomerResponse::fromArray($response);
    }
}
