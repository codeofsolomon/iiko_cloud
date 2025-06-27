<?php

namespace IikoApi\Entity\Requests\Webhook;

use IikoApi\Entity\Requests\BaseRequest;

class Request extends BaseRequest
{
    /**
     * Organization UOC Id.
     *
     * - Can be obtained by /api/1/organizations operation.
     */
    protected string $organizationId;

    /**
     * Webhook handler url.
     */
    protected string $webHooksUri;

    /**
     * Authorization token to pass to the webhook handler.
     */
    protected ?string $authToken = null;

    /**
     * Webhooks filter.
     */
    protected ?WebHooksFilter $webHooksFilter = null;

    public function __construct(string $organizationId, string $webHooksUri)
    {
        $this->organizationId = $organizationId;
        $this->webHooksUri = $webHooksUri;
    }

    public function getOrganizationId(): string
    {
        return $this->organizationId;
    }

    public function setOrganizationId(string $organizationId): void
    {
        $this->organizationId = $organizationId;
    }

    public function getWebHooksUri(): string
    {
        return $this->webHooksUri;
    }

    public function setWebHooksUri(string $webHooksUri): void
    {
        $this->webHooksUri = $webHooksUri;
    }

    public function getAuthToken(): ?string
    {
        return $this->authToken;
    }

    public function setAuthToken(?string $authToken): void
    {
        $this->authToken = $authToken;
    }

    public function getWebHooksFilter(): ?array
    {
        return $this->webHooksFilter;
    }

    public function setWebHooksFilter(?WebHooksFilter $webHooksFilter): void
    {
        $this->webHooksFilter = $webHooksFilter;
    }
}