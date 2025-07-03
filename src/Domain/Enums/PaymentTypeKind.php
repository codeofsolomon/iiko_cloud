<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum PaymentTypeKind: string implements JsonSerializable
{
    case Unknown = 'Unknown';
    case Cash = 'Cash';
    case Card = 'Card';
    case Credit = 'Credit';
    case Writeoff = 'Writeoff';
    case Voucher = 'Voucher';
    case External = 'External';
    case LoyaltyCard = 'LoyaltyCard';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
