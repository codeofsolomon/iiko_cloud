<?php

namespace IikoApi\Entity\Requests\Address;

use IikoApi\Entity\Requests\BaseRequest;

class StreetsByCityRequest extends BaseRequest
{
    /**
     * @param  string  $organizationId  UUID организаций
     * @param  string  $cityId  UUID городов (пустой → все города)
     */
    public function __construct(
        public string $organizationIds = '',
        public string $cityId = '',
        private bool $includeDeleted = false
    ) {}
}
