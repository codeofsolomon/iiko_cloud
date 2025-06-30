<?php

namespace IikoApi\Entity\Requests\Webhook;

use IikoApi\Entity\Requests\BaseRequest;

class SimpleFlagFilter extends BaseRequest
{
    public function __construct(
        private bool $updates = true,
        private ?bool $errors = null
    ) {}
}
