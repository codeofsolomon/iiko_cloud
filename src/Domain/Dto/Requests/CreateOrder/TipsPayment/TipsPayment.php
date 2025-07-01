<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\TipsPayment;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use IikoApi\Domain\Dto\Requests\CreateOrder\Payment\PaymentAdditionalData;
use IikoApi\Domain\Enums\PaymentTypeKind;
use Webmozart\Assert\Assert;

abstract class TipsPayment extends BaseRequest
{
    /**
     * @param  float  $sum  > 0 и ≤ 10 000 000 000
     * @param  string  $paymentTypeId  UUID (из /payment_types)
     * @param  string  $tipsTypeId  UUID (из /tips_types)
     */
    public function __construct(
        public PaymentTypeKind $paymentTypeKind,
        public string $tipsTypeId,
        public float $sum,
        public string $paymentTypeId,
        public ?bool $isProcessedExternally = null,
        public ?PaymentAdditionalData $paymentAdditionalData = null,
        public ?bool $isFiscalizedExternally = null,
        public ?bool $isPrepay = null,
    ) {
        Assert::uuid($tipsTypeId);
        Assert::uuid($paymentTypeId);
        Assert::range($sum, 0, 10_000_000_000);
    }
}
