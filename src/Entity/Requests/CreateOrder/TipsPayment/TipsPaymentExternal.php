<?php

namespace IikoApi\Entity\Requests\CreateOrder\TipsPayment;

use IikoApi\Enum\PaymentTypeKind;

class TipsPaymentExternal extends TipsPayment
{
    /**
     * Enum: Cash, Card, External.
     */
    protected PaymentTypeKind $paymentTypeKind = PaymentTypeKind::External;
}