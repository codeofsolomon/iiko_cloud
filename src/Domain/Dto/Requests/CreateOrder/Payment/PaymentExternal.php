<?php

namespace IikoApi\Domain\Dto\Requests\CreateOrder\Payment;

use IikoApi\Domain\Enums\PaymentTypeKind;

class PaymentExternal extends Payment
{
    /**
     * Domain\Enums: Cash, Card, IikoCard, External.
     */
    protected PaymentTypeKind $paymentTypeKind = PaymentTypeKind::External;
}
