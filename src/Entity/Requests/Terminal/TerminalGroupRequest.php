<?php

namespace IikoApi\Entity\Requests\Terminal;

use IikoApi\Entity\Requests\BaseRequest;

class TerminalGroupRequest extends BaseRequest
{
    /**
     * @var string[]
     */
    private array $organizationIds = [];

    private bool $includeDisabled = true;

    /**
     * @var string[]
     */
    private array $returnExternalData = [];

    public function __construct(
        array $organizationIds = [],
        bool $includeDisabled = false,
        array $returnExternalData = [],
    ) {
        $this->organizationIds = $organizationIds;
        $this->includeDisabled = $includeDisabled;
        $this->returnExternalData = $returnExternalData;
    }

    public function setOrganizationIds(array $ids): self
    {
        $this->organizationIds = $ids;

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

    public function shouldIncludeDisabled(): bool
    {
        return $this->includeDisabled;
    }

    public function getReturnExternalData(): array
    {
        return $this->returnExternalData;
    }
}
