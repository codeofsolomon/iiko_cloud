<?php

namespace IikoApi\Entity\Requests\Address;

use IikoApi\Entity\Requests\BaseRequest;


class CitiesRequest extends BaseRequest
{
    /**
     * @param string[] $organizationIds  • UUIDs организаций
     */
    public function __construct(protected array $organizationIds) {}

}