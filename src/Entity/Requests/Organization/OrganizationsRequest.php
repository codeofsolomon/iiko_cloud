<?php

namespace IikoApi\Entity\Requests\Organization;

use IikoApi\Entity\Requests\BaseRequest;

class OrganizationsRequest extends BaseRequest
{
    /**
     * @var string[]
     */
    private array $organizationIds = [];

    private bool $returnAdditionalInfo = false;

    private bool $includeDisabled = false;

    /**
     * @var string[]
     */
    private array $returnExternalData = [];



    public function __construct(
        array $organizationIds = [],
        bool $returnAdditionalInfo = false,
        bool $includeDisabled = false,
        array $returnExternalData = [],
    ) {
        $this->organizationIds = $organizationIds;
        $this->returnAdditionalInfo = $returnAdditionalInfo;
        $this->includeDisabled = $includeDisabled;
        $this->returnExternalData = $returnExternalData;
    }

    // --- Setters ---

    public function setOrganizationIds(array $ids): self
    {
        $this->organizationIds = $ids;
        return $this;
    }

    public function setReturnAdditionalInfo(bool $value): self
    {
        $this->returnAdditionalInfo = $value;
        return $this;
    }

    public function setIncludeDisabled(bool $value): self
    {
        $this->includeDisabled = $value;
        return $this;
    }

    public function setReturnExternalData(array $data): self
    {
        $this->returnExternalData = $data;
        return $this;
    }

    // --- Getters ---

    public function getOrganizationIds(): array
    {
        return $this->organizationIds;
    }

    public function shouldReturnAdditionalInfo(): bool
    {
        return $this->returnAdditionalInfo;
    }

    public function shouldIncludeDisabled(): bool
    {
        return $this->includeDisabled;
    }

    public function getReturnExternalData(): array
    {
        return $this->returnExternalData;
    }
}