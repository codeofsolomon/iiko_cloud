<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\TipsPayment;

use IikoApi\Domain\Dto\Requests\CreateOrder\Payment\PaymentAdditionalData;
use IikoApi\Domain\Enums\PaymentTypeKind;
use Webmozart\Assert\Assert;

/* ------------------------------------------------------------------
 | 3. Чаевые картой
 * ----------------------------------------------------------------- */
class TipsPaymentCard extends TipsPayment
{
    public function __construct(
        string $tipsTypeId,
        float $sum,
        string $paymentTypeId,
        public ?string $number = null,
        ?bool $isProcessedExternally = null,
        ?PaymentAdditionalData $paymentAdditionalData = null,
        ?bool $isFiscalizedExternally = null,
        ?bool $isPrepay = null,
    ) {
        parent::__construct(
            PaymentTypeKind::Card,
            $tipsTypeId,
            $sum,
            $paymentTypeId,
            $isProcessedExternally,
            $paymentAdditionalData,
            $isFiscalizedExternally,
            $isPrepay
        );
        Assert::nullOrMaxLength($number, 100);
    }
}
