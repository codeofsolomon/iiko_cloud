<?php

namespace IikoApi\Domain\Dto\Requests\CreateDelivery;

use Carbon\Carbon;
use IikoApi\Domain\Dto\Requests\BaseRequest;
use IikoApi\Domain\Dto\Requests\CreateDelivery\DeliveryPoint\DeliveryPoint;
use IikoApi\Domain\Dto\Requests\CreateOrder\Customer;
use IikoApi\Domain\Dto\Requests\CreateOrder\DiscountsInfo\DiscountsInfo;
use IikoApi\Domain\Dto\Requests\CreateOrder\LoyaltyInfo;
use IikoApi\Domain\Dto\Requests\CreateOrder\OrderCombo;
use IikoApi\Domain\Dto\Requests\CreateOrder\OrderItem\CompoundOrderItem;
use IikoApi\Domain\Dto\Requests\CreateOrder\OrderItem\ProductOrderItem;
use IikoApi\Domain\Dto\Requests\CreateOrder\Payment\Payment;
use IikoApi\Domain\Dto\Requests\CreateOrder\TipsPayment\TipsPayment;
use IikoApi\Domain\Enums\OrderServiceType;

class Order extends BaseRequest
{
    protected ?string $menuId;

    protected ?string $priceCategoryId;

    protected ?string $id;

    protected ?string $externalNumber;

    protected ?string $completeBefore;

    protected ?string $phone;

    protected ?string $phoneExtension;

    protected ?string $orderTypeId;

    protected ?OrderServiceType $orderServiceType = OrderServiceType::DeliveryByCourier;

    protected ?DeliveryPoint $deliveryPoint = null;

    /**
     * Order comment.
     */
    protected ?string $comment = null;

    /**
     * Customer.
     *
     * 'Regular' customer:
     * - can be used only if a customer agrees to take part in the store's loyalty programs
     * - customer details will be added (updated) to the store's customer database
     * - benefits (accumulation of rewards, etc.) of active loyalty programs will be made available to the customer
     *
     * 'One-time' customer:
     * - should be used if a customer does not agree to take part in the store's loyalty programs or an aggregator (external system) does not provide customer details
     * - customer details will NOT be added to the store's customer database and will be used ONLY to complete the current order
     */
    protected Customer\RegularCustomer|Customer\OneTimeCustomer|null $customer = null;

    /**
     * Guest details. Not equal to the customer who makes an order.
     */
    protected ?OrderGuests $guests = null;

    /**
     * Marketing source (advertisement) ID.
     *
     * - Can be obtained by /api/1/marketing_sources operation.
     */
    protected ?string $marketingSourceId = null;

    /**
     * Operator ID.
     */
    protected ?string $operatorId = null;

    /**
     * Delivery duration.
     * */
    protected ?int $deliveryDuration = null;

    protected ?string $deliveryZone = null;

    /**
     * Order items.
     *
     * @var ProductOrderItem|CompoundOrderItem[]
     */
    protected array $items = [];

    /**
     * Combos included in order.
     *
     * @var OrderCombo[]|null
     */
    protected ?array $combos = null;

    /**
     * Order payment components.
     *
     * @var Payment[]|null
     */
    protected ?array $payments = null;

    /**
     * Order tips components.
     *
     * @var TipsPayment[]|null
     */
    protected ?array $tips = null;

    /**
     * The string key (marker) of the source (partner - api user) that created the order. Needed to limit the visibility of orders for external integration.
     */
    protected ?string $sourceKey = null;

    /**
     * Discounts/surcharges.
     */
    protected ?DiscountsInfo $discountsInfo = null;

    /**
     * Information about Loyalty app.
     */
    protected ?LoyaltyInfo $loyaltyInfo = null;

    public function __construct(
        array $items,
        ?string $menuId = null,
        ?string $priceCategoryId = null,
        ?string $id = null,
        ?string $externalNumber = null,
        ?Carbon $completeBefore = null,
        ?string $phone = null,
        ?string $phoneExtension = null,
        ?string $orderTypeId = null,
        ?OrderServiceType $orderServiceType = OrderServiceType::DeliveryByCourier,
        ?DeliveryPoint $deliveryPoint = null,
        ?string $comment = null,
        Customer\RegularCustomer|Customer\OneTimeCustomer|null $customer = null,
        ?OrderGuests $guests = null,
        ?string $marketingSourceId = null,
        ?string $operatorId = null,
        ?int $deliveryDuration = null,
        ?string $deliveryZone = null,
        ?array $combos = null,
        ?array $payments = null,
        ?array $tips = null,
        ?string $sourceKey = null,
        ?DiscountsInfo $discountsInfo = null,
        ?LoyaltyInfo $loyaltyInfo = null
    ) {
        $this->items = $items;
        $this->menuId = $menuId;
        $this->priceCategoryId = $priceCategoryId;
        $this->id = $id;
        $this->externalNumber = $externalNumber ? mb_substr($externalNumber, 0, 50) : null;
        $this->completeBefore = $completeBefore?->format('Y-m-d H:i:s.v');
        $this->phone = $phone ? mb_substr($phone, 0, 40) : null;
        $this->phoneExtension = $phoneExtension ? mb_substr($phoneExtension, 0, 40) : null;
        $this->orderTypeId = $orderTypeId;
        $this->orderServiceType = $orderServiceType;
        $this->deliveryPoint = $deliveryPoint;
        $this->comment = $comment;
        $this->customer = $customer;
        $this->guests = $guests;
        $this->marketingSourceId = $marketingSourceId;
        $this->operatorId = $operatorId;
        $this->deliveryDuration = $deliveryDuration;
        $this->deliveryZone = $deliveryZone;
        $this->combos = $combos;
        $this->payments = $payments;
        $this->tips = $tips;
        $this->sourceKey = $sourceKey;
        $this->discountsInfo = $discountsInfo;
        $this->loyaltyInfo = $loyaltyInfo;
    }
}
