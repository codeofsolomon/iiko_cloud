<?php

namespace IikoApi\Entity\Requests\CreateOrder\Payment;

use IikoApi\Enum\PaymentTypeKind;

class PaymentCard extends Payment
{
    /**
     * Card No.
     *
     * - In iikoFront, it is possible to make card payment without card No.
     */
    protected ?string $number = null;

    /**
     * Enum: Cash, Card, IikoCard, External.
     */
    protected PaymentTypeKind $paymentTypeKind = PaymentTypeKind::Card;

    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }
}