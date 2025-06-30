<?php

namespace IikoApi\Entity\Requests\Menu;

use IikoApi\Entity\Requests\BaseRequest;

class MenuRequest extends BaseRequest
{
    protected string $organizationId;

    protected ?int $startRevision = null;

    public function __construct(string $organizationId)
    {
        $this->organizationId = $organizationId;
    }

    public function setStartRevision(?int $startRevision): void
    {
        $this->startRevision = $startRevision;
    }
}
