<?php

namespace IikoApi\Enum;

enum PaymentCardType: string
{
    case LOYALTY_CARD = 'LoyaltyCard';
    case CARD = 'Card';
    case EXTERNAL = 'External';
}