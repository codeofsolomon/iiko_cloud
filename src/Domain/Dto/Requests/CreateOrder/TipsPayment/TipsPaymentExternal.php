<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\TipsPayment;

use IikoApi\Domain\Enums\PaymentTypeKind;

/* ------------------------------------------------------------------
 | 4. Внешняя платёжная система (эквайринг, агрегатор)
 * ----------------------------------------------------------------- */
class TipsPaymentExternal extends TipsPayment
{
    public function __construct(
        string $tipsTypeId,
        float $sum,
        string $paymentTypeId,
        ?bool $isFiscalizedExternally = null,
    ) {
        parent::__construct(
            PaymentTypeKind::External,
            $tipsTypeId,
            $sum,
            $paymentTypeId,
            isProcessedExternally: true,
            paymentAdditionalData: null,
            isFiscalizedExternally: $isFiscalizedExternally,
            isPrepay: null
        );
    }
}
