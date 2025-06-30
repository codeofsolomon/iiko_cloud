<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Domain\Dto\Requests\Organization\OrganizationsRequest;
use IikoApi\Domain\Dto\Responses\Organization\Organization;

final class OrganizationService extends BaseService
{
    public function getOrganizations(?OrganizationsRequest $filter): array
    {
        $filter ??= new OrganizationsRequest;

        $organizations = [];

        $response = $this->authorizedRequest(
            'POST',
            Constants::ORGANIZATIONS_URL,
            $filter->toArray(),
        );

        foreach ($response['organizations'] as $value) {
            $organizations[] = Organization::fromArray($value);
        }

        return $organizations;

    }
}
