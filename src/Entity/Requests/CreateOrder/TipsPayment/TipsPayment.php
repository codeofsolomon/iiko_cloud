<?php

namespace IikoApi\Entity\Requests\CreateOrder\TipsPayment;

use IikoApi\Entity\Requests\BaseRequest;
use IikoApi\Enum\PaymentTypeKind;
use IikoApi\Entity\Requests\CreateOrder\Payment\PaymentAdditionalData;

class TipsPayment extends BaseRequest
{
    protected PaymentTypeKind $paymentTypeKind = PaymentTypeKind::Cash;

    /**
     * Tips type ID.
     *
     * - Can be obtained by /api/1/tips_types operation.
     */
    protected string $tipsTypeId;

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

    protected ?bool $isPrepay = null;


    public function __construct(
        string $tipsTypeId, 
        float $sum, 
        string $paymentTypeId,
        ?bool $isProcessedExternally = null,
        ?PaymentAdditionalData $paymentAdditionalData = null,
        ?bool $isFiscalizedExternally = null,
        ?bool $isPrepay = null
    )
    {
        $this->tipsTypeId = $tipsTypeId;
        $this->sum = $sum;
        $this->paymentTypeId = $paymentTypeId;
        $this->isProcessedExternally = $isProcessedExternally;
        $this->paymentAdditionalData = $paymentAdditionalData;
        $this->isFiscalizedExternally = $isFiscalizedExternally;
        $this->isPrepay = $isPrepay;
    }

    public function setTipsTypeId(string $tipsTypeId): void
    {
        $this->tipsTypeId = $tipsTypeId;
    }

    public function setSum(float $sum): void
    {
        $this->sum = $sum;
    }

    public function setPaymentTypeId(string $paymentTypeId): void
    {
        $this->paymentTypeId = $paymentTypeId;
    }

    public function setIsProcessedExternally(?bool $isProcessedExternally): void
    {
        $this->isProcessedExternally = $isProcessedExternally;
    }

    public function setPaymentAdditionalData(?PaymentAdditionalData $paymentAdditionalData): void
    {
        $this->paymentAdditionalData = $paymentAdditionalData;
    }

    public function setIsFiscalizedExternally(?bool $isFiscalizedExternally): void
    {
        $this->isFiscalizedExternally = $isFiscalizedExternally;
    }

}