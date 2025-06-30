<?php

namespace IikoApi\Entity\Requests\LoyaltyCalculate;

use IikoApi\Entity\Requests\BaseRequest;
use IikoApi\Entity\Requests\CreateDelivery\Order;

class Request extends BaseRequest
{
    protected string $organizationId;

    protected Order $order;

    /**
     * Identifier of a target terminal. Should be used only when auto distribution is off and no call center operator is available.
     */
    protected ?string $terminalGroupId = null;

    /**
     * Number of applied coupon. Can be null.
     */
    protected ?string $coupon = null;

    /**
     * Referrer id.
     */
    protected ?string $referrerId = null;

    /**
     * @var string[]
     *
     * List of identifiers of applied campaigns. Should be empty if no payment method is used.
     */
    protected array $availablePaymentMarketingCampaignIds = [];

    /**
     * @var string[]
     *
     * List of manually applied to order conditions
     */
    protected array $applicableManualConditions = [];

    /**
     * @var DynamicDiscount[]
     *
     * Applicable manual discounts
     */
    protected array $dynamicDiscounts = [];

    public function __construct(string $organizationId, Order $order)
    {
        $this->organizationId = $organizationId;
        $this->order = $order;
    }

    public function getOrganizationId(): string
    {
        return $this->organizationId;
    }

    public function setOrganizationId(string $organizationId): void
    {
        $this->organizationId = $organizationId;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    public function getTerminalGroupId(): ?string
    {
        return $this->terminalGroupId;
    }

    public function setTerminalGroupId(?string $terminalGroupId): void
    {
        $this->terminalGroupId = $terminalGroupId;
    }

    public function getCoupon(): ?string
    {
        return $this->coupon;
    }

    public function setCoupon(?string $coupon): void
    {
        $this->coupon = $coupon;
    }

    public function getReferrerId(): ?string
    {
        return $this->referrerId;
    }

    public function setReferrerId(?string $referrerId): void
    {
        $this->referrerId = $referrerId;
    }

    /**
     * @return string[]
     */
    public function getAvailablePaymentMarketingCampaignIds(): array
    {
        return $this->availablePaymentMarketingCampaignIds;
    }

    /**
     * @param  string[]  $availablePaymentMarketingCampaignIds
     */
    public function setAvailablePaymentMarketingCampaignIds(array $availablePaymentMarketingCampaignIds): void
    {
        $this->availablePaymentMarketingCampaignIds = $availablePaymentMarketingCampaignIds;
    }

    /**
     * @return string[]
     */
    public function getApplicableManualConditions(): array
    {
        return $this->applicableManualConditions;
    }

    /**
     * @param  string[]  $applicableManualConditions
     */
    public function setApplicableManualConditions(array $applicableManualConditions): void
    {
        $this->applicableManualConditions = $applicableManualConditions;
    }

    /**
     * @return DynamicDiscount[]
     */
    public function getDynamicDiscounts(): array
    {
        return $this->dynamicDiscounts;
    }

    /**
     * @param  DynamicDiscount[]  $dynamicDiscounts
     */
    public function setDynamicDiscounts(array $dynamicDiscounts): void
    {
        $this->dynamicDiscounts = $dynamicDiscounts;
    }
}
