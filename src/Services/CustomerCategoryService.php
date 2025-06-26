<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;
use IikoApi\Entity\Requests\CustomerCategory\CustomerCategoriesRequest;
use IikoApi\Entity\Responses\CustomerCategory\CategoryResponse;
use IikoApi\Entity\Responses\CustomerCategory\CustomerCategoryManageRequest;

class CustomerCategoryService
{
     public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    
    /**
     * Summary of getCategories
     * @param \IikoApi\Entity\Requests\CustomerCategory\CustomerCategoriesRequest $request
     * @return CategoryResponse
     */
    public function getCategories(CustomerCategoriesRequest $request): CategoryResponse
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::CUSTOMER_CATEGORY,
            $request->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return CategoryResponse::fromArray($response);
    }


    /**
     * Summary of addCategoryToCustomer
     * @param \IikoApi\Entity\Responses\CustomerCategory\CustomerCategoryManageRequest $request
     * @return bool
     */
    public function addCategoryToCustomer(CustomerCategoryManageRequest $request): bool
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::ADD_CUSTOMER_CATEGORY,
            $request->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return empty($response);
    }


    /**
     * Summary of removeCategoryToCustomer
     * @param \IikoApi\Entity\Responses\CustomerCategory\CustomerCategoryManageRequest $request
     * @return bool
     */
    public function removeCategoryToCustomer(CustomerCategoryManageRequest $request): bool
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::REMOVE_CUSTOMER_CATEGORY,
            $request->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return empty($response);
    }

}