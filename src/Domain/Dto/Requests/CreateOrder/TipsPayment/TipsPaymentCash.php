<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\TipsPayment;

use IikoApi\Domain\Enums\PaymentTypeKind;

/* ------------------------------------------------------------------
 | 2. Наличные чаевые
 * ----------------------------------------------------------------- */
class TipsPaymentCash extends TipsPayment
{
    public function __construct(
        string $tipsTypeId,
        float $sum,
        string $paymentTypeId,
        ?bool $isFiscalizedExternally = null,
        ?bool $isPrepay = null,
    ) {
        parent::__construct(
            PaymentTypeKind::Cash,
            $tipsTypeId,
            $sum,
            $paymentTypeId,
            isProcessedExternally: null,
            paymentAdditionalData: null,
            isFiscalizedExternally: $isFiscalizedExternally,
            isPrepay: $isPrepay
        );
    }
}
