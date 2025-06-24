<?php

namespace Src\Entity\Requests\CreateOrder\Payment;

use IikoApi\Enum\PaymentTypeKind;

class PaymentLoyaltyCard extends Payment
{
    /**
     * Enum: Cash, Card, IikoCard, External.
     */
    protected PaymentTypeKind $paymentTypeKind = PaymentTypeKind::LoyaltyCard;
}