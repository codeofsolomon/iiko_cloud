<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\Webhook;

use IikoApi\Domain\Dto\Requests\OneOrganizationRequest;
use Webmozart\Assert\Assert;

/**
 * /webhooks
 *
 * • organizationId — UUID организации
 * • webHooksUri    — абсолютный URL, куда iiko будет слать POST-запросы
 * • authToken      — произвольный токен, который iiko вернёт в заголовке
 *                    `X-Auth-Token` (можно использовать для верификации)
 * • webHooksFilter — объект фильтрации (может быть null ⇒ всё подряд)
 */
class WebhookRequest extends OneOrganizationRequest
{
    public function __construct(
        public string $organizationId,
        public string $webHooksUri,
        public ?string $authToken = null,
        public ?WebHooksFilter $webHooksFilter = null,
    ) {
        parent::__construct($organizationId);
        Assert::uuid($organizationId, 'organizationId должен быть валидным UUID.');
        Assert::url($webHooksUri, 'webHooksUri должен быть валидным URL.');
        Assert::nullOrStringNotEmpty($authToken);
    }
}
