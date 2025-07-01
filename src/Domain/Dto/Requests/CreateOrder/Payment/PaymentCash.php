<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\Payment;

use IikoApi\Domain\Enums\PaymentTypeKind;

class PaymentCash extends Payment
{
    public function __construct(
        float $sum,
        string $paymentTypeId,
        ?bool $isProcessedExternally = null,
        ?bool $isFiscalizedExternally = null,
        ?bool $isPrepay = null,
    ) {
        parent::__construct(
            PaymentTypeKind::Cash,
            $sum,
            $paymentTypeId,
            $isProcessedExternally,
            null,
            $isFiscalizedExternally,
            $isPrepay
        );
    }
}
