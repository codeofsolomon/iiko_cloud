<?php

namespace Src\Entity\Requests\CreateOrder\TipsPayment;

use IikoApi\Enum\PaymentTypeKind;

class TipsPaymentCash extends TipsPayment
{
    /**
     * Enum: Cash, Card, External.
     */
    protected PaymentTypeKind $paymentTypeKind = PaymentTypeKind::Cash;
}