<?php

namespace IikoApi\Entity\Responses\CustomerCategory;

use IikoApi\Entity\Requests\BaseRequest;

class CustomerCategoryManageRequest extends BaseRequest
{
    public function __construct(
        protected string $organizationId,   // UUID организации
        protected string $customerId,       // UUID гостя
        protected string $categoryId,       // UUID категории
    ) {}
}