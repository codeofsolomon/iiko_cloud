<?php

namespace IikoApi\Entity\Requests\Webhook;

use IikoApi\Entity\Requests\BaseRequest;

class TableOrderFilter extends BaseRequest
{
    public function __construct(
        private array $orderStatuses = [],
        private array $itemStatuses  = [],
        private bool  $errors        = false,
    ) {}
}