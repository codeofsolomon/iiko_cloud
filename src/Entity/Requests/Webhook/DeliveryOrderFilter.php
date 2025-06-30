<?php

namespace IikoApi\Entity\Requests\Webhook;

use IikoApi\Entity\Requests\BaseRequest;

class DeliveryOrderFilter extends BaseRequest
{
    public function __construct(
        private array $orderStatuses = [],
        private array $itemStatuses = [],
        private bool $errors = false,
        private ?array $returnedExternalDataKeys = null, // string[]
    ) {}
}
