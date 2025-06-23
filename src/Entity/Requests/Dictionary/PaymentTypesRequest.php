<?php

namespace Src\Entity\Requests\Dictionary;

use IikoApi\Entity\Requests\BaseRequest;

class PaymentTypesRequest extends BaseRequest
{
     /**
     * @var string[]
     */
    protected array $organizationIds = [];

    /**
     * @param string[] $organizationIds
     */
    public function __construct(array $organizationIds = [])
    {
        $this->organizationIds = $organizationIds;
    }

    /**
     * @param string[] $organizationIds
     */
    public function setOrganizationIds(array $organizationIds): void
    {
        $this->organizationIds = $organizationIds;
    }

    public function addOrganizationId(string $organizationId): void
    {
        $this->organizationIds[] = $organizationId;
    }
}