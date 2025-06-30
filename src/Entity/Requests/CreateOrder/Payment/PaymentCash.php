<?php

namespace IikoApi\Entity\Requests\CreateOrder\Payment;

class PaymentCash extends Payment
{
    /**
     * Domain\Enums: Cash, Card, IikoCard, External.
     */
    protected string $paymentTypeKind = 'Cash';
}
