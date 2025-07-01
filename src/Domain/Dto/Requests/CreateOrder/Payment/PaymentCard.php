<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\Payment;

use IikoApi\Domain\Enums\PaymentTypeKind;
use Webmozart\Assert\Assert;

class PaymentCard extends Payment
{
    public function __construct(
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
