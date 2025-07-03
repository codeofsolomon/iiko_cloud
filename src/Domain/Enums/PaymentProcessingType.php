<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum PaymentProcessingType: string implements JsonSerializable
{
    case External = 'External';
    case Internal = 'Internal';
    case Both = 'Both';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
