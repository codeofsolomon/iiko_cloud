<?php

namespace IikoApi\Services;

use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;
use IikoApi\Entity\Requests\Organization\OrganizationsRequest;
use IikoApi\Constants;
use IikoApi\Entity\Responses\Organization\Organization;

class OrganizationService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    
    public function getOrganizations(?OrganizationsRequest $filter): array
    {
        $token = $this->auth->getToken();

        $filter ??= new OrganizationsRequest();

        $organizations = [];

        $response = $this->client->request(
            'POST',
            Constants::ORGANIZATIONS_URL,
            $filter->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        foreach ($response['organizations'] as $value) {
            $organizations[] = Organization::fromArray($value);
        }

        return $organizations;
       
    }
}