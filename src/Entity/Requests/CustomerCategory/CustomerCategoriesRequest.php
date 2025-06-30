<?php

namespace IikoApi\Entity\Requests\CustomerCategory;

use IikoApi\Entity\Requests\BaseRequest;

class CustomerCategoriesRequest extends BaseRequest
{
    /**
     * @param  string[]  $organizationIds  UUID-ы организаций (пустой массив → все)
     */
    public function __construct(protected string $organizationId) {}
}
