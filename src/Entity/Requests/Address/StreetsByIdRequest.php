<?php

namespace IikoApi\Entity\Requests\Address;

use IikoApi\Entity\Requests\BaseRequest;

class StreetsByIdRequest extends BaseRequest
{
    /**
     * @param string[] $organizationIds  UUID-ы организаций
     * @param string[] $streetIds        UUID-ы нужных улиц
     */
    public function __construct(
        private array $organizationIds = [],
        private array $streetIds       = [],
        private array $classifierIds = [],
    ) {}
}