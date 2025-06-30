<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Entity\Requests\CustomerCategory\CustomerCategoriesRequest;
use IikoApi\Entity\Responses\CustomerCategory\CategoryResponse;
use IikoApi\Entity\Responses\CustomerCategory\CustomerCategoryManageRequest;

final class CustomerCategoryService extends BaseService
{
    /**
     * Summary of getCategories
     */
    public function getCategories(CustomerCategoriesRequest $request): CategoryResponse
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::CUSTOMER_CATEGORY,
            $request->prepareRequest(),
        );

        return CategoryResponse::fromArray($response);
    }

    /**
     * Summary of addCategoryToCustomer
     */
    public function addCategoryToCustomer(CustomerCategoryManageRequest $request): bool
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::ADD_CUSTOMER_CATEGORY,
            $request->prepareRequest(),
        );

        return empty($response);
    }

    /**
     * Summary of removeCategoryToCustomer
     */
    public function removeCategoryToCustomer(CustomerCategoryManageRequest $request): bool
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::REMOVE_CUSTOMER_CATEGORY,
            $request->prepareRequest(),
        );

        return empty($response);
    }
}
