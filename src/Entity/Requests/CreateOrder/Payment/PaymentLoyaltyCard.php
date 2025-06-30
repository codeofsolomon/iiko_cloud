<?php

namespace IikoApi\Entity\Requests\CreateOrder\Payment;

use IikoApi\Domain\Enums\PaymentTypeKind;

class PaymentLoyaltyCard extends Payment
{
    /**
     * Domain\Enums: Cash, Card, IikoCard, External.
     */
    protected PaymentTypeKind $paymentTypeKind = PaymentTypeKind::LoyaltyCard;
}
