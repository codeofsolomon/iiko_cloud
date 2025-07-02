<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Domain\Dto\Requests\CustomerCategory\CustomerCategoriesRequest;
use IikoApi\Domain\Dto\Responses\CustomerCategory\CategoryResponse;
use IikoApi\Domain\Dto\Requests\CustomerCategory\CustomerCategoryManageRequest;

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
            $request->toArray(),
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
            $request->toArray(),
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
            $request->toArray(),
        );

        return empty($response);
    }
}
