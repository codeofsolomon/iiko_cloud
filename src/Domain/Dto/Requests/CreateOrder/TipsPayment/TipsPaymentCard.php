<?php

namespace IikoApi\Domain\Dto\Requests\CreateOrder\TipsPayment;

use IikoApi\Domain\Enums\PaymentTypeKind;

class TipsPaymentCard extends TipsPayment
{
    /**
     * Card No.
     *
     * - In iikoFront, it is possible to make card payment without card No.
     */
    protected ?string $number = null;

    /**
     * Domain\Enums: Cash, Card, External.
     */
    protected PaymentTypeKind $paymentTypeKind = PaymentTypeKind::Card;

    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }
}
