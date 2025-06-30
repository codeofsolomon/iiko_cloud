<?php

namespace IikoApi\Application\Services;

use IikoApi\Application\Contracts\Http\ApiClientInterface;
use IikoApi\Constants;
use IikoApi\Entity\Requests\CustomerCategory\CustomerCategoriesRequest;
use IikoApi\Entity\Responses\CustomerCategory\CategoryResponse;
use IikoApi\Entity\Responses\CustomerCategory\CustomerCategoryManageRequest;
use IikoApi\Infrastructure\Auth\TokenAuthenticator;

class CustomerCategoryService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    /**
     * Summary of getCategories
     */
    public function getCategories(CustomerCategoriesRequest $request): CategoryResponse
    {
        $response = $this->client->request(
            'POST',
            Constants::CUSTOMER_CATEGORY,
            $request->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return CategoryResponse::fromArray($response);
    }

    /**
     * Summary of addCategoryToCustomer
     */
    public function addCategoryToCustomer(CustomerCategoryManageRequest $request): bool
    {
        $response = $this->client->request(
            'POST',
            Constants::ADD_CUSTOMER_CATEGORY,
            $request->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return empty($response);
    }

    /**
     * Summary of removeCategoryToCustomer
     */
    public function removeCategoryToCustomer(CustomerCategoryManageRequest $request): bool
    {
        $response = $this->client->request(
            'POST',
            Constants::REMOVE_CUSTOMER_CATEGORY,
            $request->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return empty($response);
    }
}
