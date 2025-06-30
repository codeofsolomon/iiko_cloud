<?php

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Entity\Requests\Organization\OrganizationsRequest;
use IikoApi\Entity\Responses\Organization\Organization;

final class OrganizationService extends BaseService
{
    public function getOrganizations(?OrganizationsRequest $filter): array
    {
        $filter ??= new OrganizationsRequest;

        $organizations = [];

        $response = $this->authorizedRequest(
            'POST',
            Constants::ORGANIZATIONS_URL,
            $filter->prepareRequest(),
        );

        foreach ($response['organizations'] as $value) {
            $organizations[] = Organization::fromArray($value);
        }

        return $organizations;

    }
}
