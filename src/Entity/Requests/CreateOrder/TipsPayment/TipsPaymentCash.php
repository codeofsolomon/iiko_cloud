<?php

namespace IikoApi\Entity\Requests\CreateOrder\TipsPayment;

use IikoApi\Domain\Enums\PaymentTypeKind;

class TipsPaymentCash extends TipsPayment
{
    /**
     * Domain\Enums: Cash, Card, External.
     */
    protected PaymentTypeKind $paymentTypeKind = PaymentTypeKind::Cash;
}
