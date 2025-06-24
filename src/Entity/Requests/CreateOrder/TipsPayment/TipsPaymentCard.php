<?php

namespace Src\Entity\Requests\CreateOrder\TipsPayment;

use IikoApi\Enum\PaymentTypeKind;

class TipsPaymentCard extends TipsPayment
{
    /**
     * Card No.
     *
     * - In iikoFront, it is possible to make card payment without card No.
     */
    protected ?string $number = null;

    /**
     * Enum: Cash, Card, External.
     */
    protected PaymentTypeKind $paymentTypeKind = PaymentTypeKind::Card;

    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }
}