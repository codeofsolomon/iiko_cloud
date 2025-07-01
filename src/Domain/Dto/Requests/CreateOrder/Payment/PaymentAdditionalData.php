<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\Payment;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use IikoApi\Domain\Enums\PaymentCardType;
use IikoApi\Domain\Enums\PaymentSearchScope;
use Webmozart\Assert\Assert;

class PaymentAdditionalData extends BaseRequest
{
    public function __construct(
        public string $credential,
        public PaymentSearchScope $searchScope,
        public PaymentCardType $type = PaymentCardType::LOYALTY_CARD,
        public ?string $customData = null,      // ≤ 5000
    ) {
        Assert::stringNotEmpty($credential);
        Assert::maxLength($customData, 5000);
    }
}
