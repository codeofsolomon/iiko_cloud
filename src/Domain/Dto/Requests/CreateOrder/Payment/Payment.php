<?php

namespace IikoApi\Domain\Dto\Requests\CreateOrder\Payment;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use IikoApi\Domain\Enums\PaymentTypeKind;

class Payment extends BaseRequest
{
    /**
     * Domain\Enums: Cash, Card, IikoCard, External.
     */
    protected PaymentTypeKind $paymentTypeKind = PaymentTypeKind::Cash;

    /**
     * Amount due.
     *
     * - [ 0 .. 10000000000 ]
     */
    protected float $sum;

    /**
     * Payment type.
     *
     * - Can be obtained by /api/1/payment_types operation.
     */
    protected string $paymentTypeId;

    /**
     * Whether payment item is processed by external payment system (made from outside).
     */
    protected ?bool $isProcessedExternally = null;

    /**
     * Additional payment parameters.
     */
    protected ?PaymentAdditionalData $paymentAdditionalData = null;

    /**
     * Whether the payment item is externally fiscalized.
     */
    protected ?bool $isFiscalizedExternally = null;

    /**
     * Whether the payment item is prepay. Unavailable for paymentKindType.LoyaltyCard.
     */
    protected ?bool $isPrepay = null;

    public function __construct(
        float $sum,
        string $paymentTypeId,
        ?bool $isProcessedExternally = null,
        ?PaymentAdditionalData $paymentAdditionalData = null,
        ?bool $isFiscalizedExternally = null,
        ?bool $isPrepay = null
    ) {
        $this->sum = $sum;
        $this->paymentTypeId = $paymentTypeId;
        $this->isProcessedExternally = $isProcessedExternally;
        $this->paymentAdditionalData = $paymentAdditionalData;
        $this->isFiscalizedExternally = $isFiscalizedExternally;
        $this->isPrepay = $isPrepay;
    }

    public function setSum(float $sum): void
    {
        $this->sum = $sum;
    }

    public function setPaymentTypeId(string $paymentTypeId): void
    {
        $this->paymentTypeId = $paymentTypeId;
    }

    public function setIsProcessedExternally(bool $isProcessedExternally): void
    {
        $this->isProcessedExternally = $isProcessedExternally;
    }

    public function setPaymentAdditionalData(?PaymentAdditionalData $paymentAdditionalData): void
    {
        $this->paymentAdditionalData = $paymentAdditionalData;
    }

    public function setIsFiscalizedExternally(bool $isFiscalizedExternally): void
    {
        $this->isFiscalizedExternally = $isFiscalizedExternally;
    }
}
