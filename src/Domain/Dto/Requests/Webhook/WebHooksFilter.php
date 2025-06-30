<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\Webhook;

use IikoApi\Domain\Dto\Requests\BaseRequest;

/**
 * Объединяет все возможные под-фильтры.
 * Любой из них может быть null ⇒ не фильтровать по данному типу уведомлений.
 */
class WebHooksFilter extends BaseRequest
{
    public function __construct(
        public ?DeliveryOrderFilter $deliveryOrderFilter = null,
        public ?TableOrderFilter $tableOrderFilter = null,
        public ?SimpleFlagFilter $reserveFilter = null,
        public ?SimpleFlagFilter $stopListUpdateFilter = null,
        public ?SimpleFlagFilter $personalShiftFilter = null,
        public ?SimpleFlagFilter $nomenclatureUpdateFilter = null,
    ) {}
}
