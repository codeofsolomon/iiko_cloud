<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\Payment;

use IikoApi\Domain\Enums\PaymentTypeKind;

class PaymentExternal extends Payment
{
    public function __construct(
        float $sum,
        string $paymentTypeId,
        ?bool $isFiscalizedExternally = null,
    ) {
        parent::__construct(
            PaymentTypeKind::External,
            $sum,
            $paymentTypeId,
            isProcessedExternally: true, // по определению
            paymentAdditionalData: null,
            isFiscalizedExternally: $isFiscalizedExternally,
            isPrepay: null
        );
    }
}
