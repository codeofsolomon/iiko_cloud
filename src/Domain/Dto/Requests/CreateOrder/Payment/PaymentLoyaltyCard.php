<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\Payment;

use IikoApi\Domain\Enums\PaymentTypeKind;

class PaymentLoyaltyCard extends Payment
{
    public function __construct(
        float $sum,
        string $paymentTypeId,
        ?PaymentAdditionalData $paymentAdditionalData,
        ?bool $isProcessedExternally = null,
    ) {
        parent::__construct(
            PaymentTypeKind::LoyaltyCard,
            $sum,
            $paymentTypeId,
            $isProcessedExternally,
            $paymentAdditionalData,
            isFiscalizedExternally: null,
            isPrepay: null
        );
    }
}
