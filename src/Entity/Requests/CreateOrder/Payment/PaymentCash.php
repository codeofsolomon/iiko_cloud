<?php

namespace IikoApi\Entity\Requests\CreateOrder\Payment;

class PaymentCash extends Payment
{
    /**
     * Enum: Cash, Card, IikoCard, External.
     */
    protected string $paymentTypeKind = 'Cash';
}