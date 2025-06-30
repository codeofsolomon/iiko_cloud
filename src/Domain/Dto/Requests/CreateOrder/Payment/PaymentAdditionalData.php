<?php

namespace IikoApi\Domain\Dto\Requests\CreateOrder\Payment;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use IikoApi\Domain\Enums\PaymentCardType;
use IikoApi\Domain\Enums\PaymentSearchScope;

class PaymentAdditionalData extends BaseRequest
{
    /**
     * Guest credential, authorizing payment.
     */
    protected string $credential;

    /**
     * Guest credential search scope.
     *
     * - Domain\Enums: "Reserved" "Phone" "CardNumber" "CardTrack" "PaymentToken" "FindFaceId"
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
