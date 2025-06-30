<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\Http\ApiClientInterface;
use IikoApi\Entity\Requests\Organization\OrganizationsRequest;
use IikoApi\Entity\Responses\Organization\Organization;
use IikoApi\Infrastructure\Auth\TokenAuthenticator;

class OrganizationService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    public function getOrganizations(?OrganizationsRequest $filter): array
    {
        $filter ??= new OrganizationsRequest;

        $organizations = [];

        $response = $this->client->request(
            'POST',
            Constants::ORGANIZATIONS_URL,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        foreach ($response['organizations'] as $value) {
            $organizations[] = Organization::fromArray($value);
        }

        return $organizations;

    }
}
