<?php

namespace Src\Entity\Requests\CreateOrder\Payment;

use IikoApi\Entity\Requests\BaseRequest;
use Src\Enum\PaymentCardType;
use Src\Enum\PaymentSearchScope;

class PaymentAdditionalData extends BaseRequest
{
    /**
     * Guest credential, authorizing payment.
     */
    protected string $credential;

    /**
     * Guest credential search scope.
     *
     * - Enum: "Reserved" "Phone" "CardNumber" "CardTrack" "PaymentToken" "FindFaceId"
     */
    protected PaymentSearchScope $searchScope;

    protected PaymentCardType $type = PaymentCardType::LOYALTY_CARD;

    protected ?string $customData = null;

    public function __construct(
        string $credential, 
        PaymentSearchScope $searchScope, 
        PaymentCardType $type,
        ?string $customData = null)
    {
        $this->credential = $credential;
        $this->searchScope = $searchScope;
        $this->type = $type;
        $this->customData = $customData ? mb_substr($customData, 0, 5000) : null;
    }
}