<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\Http\ApiClientInterface;
use IikoApi\Entity\Requests\Webhook\Request;
use IikoApi\Infrastructure\Auth\TokenAuthenticator;

class WebhookService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    public function updateWebhook(Request $request): string
    {
        $response = $this->client->request(
            'POST',
            Constants::REGIONS,
            $request->prepareRequest(),
            ['Authorization' => "Bearer {$this->auth->token()}"]
        );

        return $response['correlationId'];
    }
}
