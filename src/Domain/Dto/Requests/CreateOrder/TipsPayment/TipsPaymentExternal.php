<?php

namespace IikoApi\Domain\Dto\Requests\CreateOrder\TipsPayment;

use IikoApi\Domain\Enums\PaymentTypeKind;

class TipsPaymentExternal extends TipsPayment
{
    /**
     * Domain\Enums: Cash, Card, External.
     */
    protected PaymentTypeKind $paymentTypeKind = PaymentTypeKind::External;
}
