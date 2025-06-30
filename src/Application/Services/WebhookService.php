<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Application\Contracts\Http\ApiClientInterface;
use IikoApi\Constants;
use IikoApi\Entity\Requests\Webhook\Request;
use IikoApi\Infrastructure\Auth\TokenAuthenticator;

final class WebhookService extends BaseService
{
    public function __construct(
        protected ApiClientInterface $client,
        protected TokenAuthenticator $auth
    ) {}

    public function updateWebhook(Request $request): string
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::REGIONS,
            $request->prepareRequest(),
        );

        return $response['correlationId'];
    }
}
