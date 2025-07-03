<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum PaymentCardType: string implements JsonSerializable
{
    case LOYALTY_CARD = 'LoyaltyCard';
    case CARD = 'Card';
    case EXTERNAL = 'External';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
