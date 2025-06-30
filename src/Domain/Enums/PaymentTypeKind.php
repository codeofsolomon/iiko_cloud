<?php

namespace IikoApi\Domain\Enums;

enum PaymentTypeKind: string
{
    case Unknown = 'Unknown';
    case Cash = 'Cash';
    case Card = 'Card';
    case Credit = 'Credit';
    case Writeoff = 'Writeoff';
    case Voucher = 'Voucher';
    case External = 'External';
    case LoyaltyCard = 'LoyaltyCard';
}
