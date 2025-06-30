<?php

namespace IikoApi\Entity\Requests\Webhook;

use IikoApi\Entity\Requests\BaseRequest;

class WebHooksFilter extends BaseRequest
{
    public function __construct(
        private ?DeliveryOrderFilter $deliveryOrderFilter = null,
        private ?TableOrderFilter $tableOrderFilter = null,
        private ?SimpleFlagFilter $reserveFilter = null,
        private ?SimpleFlagFilter $stopListUpdateFilter = null,
        private ?SimpleFlagFilter $personalShiftFilter = null,
        private ?SimpleFlagFilter $nomenclatureUpdateFilter = null,
    ) {}
}
