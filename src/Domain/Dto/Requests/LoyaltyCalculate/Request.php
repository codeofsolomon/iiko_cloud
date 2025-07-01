<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\LoyaltyCalculate;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use IikoApi\Domain\Dto\Requests\CreateDelivery\Order;
use Webmozart\Assert\Assert;

class Request extends BaseRequest
{
    /**
     * @param  string  $organizationId  UUID
     * @param  Order  $order  Заказ, сформированный ранее
     * @param  string[]  $availablePaymentMarketingCampaignIds
     * @param  string[]  $applicableManualConditions
     * @param  DynamicDiscount[]  $dynamicDiscounts
     */
    public function __construct(
        public string $organizationId,
        public Order $order,
        public ?string $terminalGroupId = null,  // UUID TG
        public ?string $coupon = null,
        public ?string $referrerId = null,  // UUID
        public array $availablePaymentMarketingCampaignIds = [],
        public array $applicableManualConditions = [],
        public array $dynamicDiscounts = [],
    ) {
        /* --- UUID/строки ------------------------------------------------- */
        Assert::uuid($organizationId);
        Assert::nullOrUuid($terminalGroupId);
        Assert::nullOrUuid($referrerId);

        /* --- массивы ----------------------------------------------------- */
        Assert::allUuid($availablePaymentMarketingCampaignIds);
        Assert::allStringNotEmpty($applicableManualConditions);
        Assert::allIsInstanceOf($dynamicDiscounts, DynamicDiscount::class);
    }
}
