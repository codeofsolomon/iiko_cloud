<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Domain\Dto\Requests\Webhook\WebhookRequest;

final class WebhookService extends BaseService
{
    public function updateWebhook(WebhookRequest $request): string
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::WEBHOOK_UPDATE_SETTINGS,
            $request->toArray(),
        );

        return $response['correlationId'];
    }
}
