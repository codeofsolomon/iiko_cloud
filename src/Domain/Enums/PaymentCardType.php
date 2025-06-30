<?php

namespace IikoApi\Domain\Enums;

enum PaymentCardType: string
{
    case LOYALTY_CARD = 'LoyaltyCard';
    case CARD = 'Card';
    case EXTERNAL = 'External';
}
