<?php

namespace IikoApi\Services;

use IikoApi\Constants;
use IikoApi\Contracts\ApiClientInterface;
use IikoApi\Auth\TokenAuthenticator;
use IikoApi\Entity\Requests\Webhook\Request;

class WebhookService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}


    public function updateWebhook(Request $request): string
    {
        $token = $this->auth->getToken();

        $response = $this->client->request(
            'POST',
            Constants::REGIONS,
            $request->prepareRequest(),
            ['Authorization' => "Bearer $token"]
        );

        return $response['correlationId'];
    }
}