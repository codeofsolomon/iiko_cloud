<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateDelivery;

use DateTimeInterface;
use IikoApi\Domain\Dto\Requests\BaseRequest;
use IikoApi\Domain\Dto\Requests\CreateDelivery\DeliveryPoint\DeliveryPoint;
use IikoApi\Domain\Dto\Requests\CreateOrder\Customer\OneTimeCustomer;
use IikoApi\Domain\Dto\Requests\CreateOrder\Customer\RegularCustomer;
use IikoApi\Domain\Dto\Requests\CreateOrder\DiscountsInfo\DiscountsInfo;
use IikoApi\Domain\Dto\Requests\CreateOrder\LoyaltyInfo;
use IikoApi\Domain\Dto\Requests\CreateOrder\OrderCombo;
use IikoApi\Domain\Dto\Requests\CreateOrder\OrderItem\CompoundOrderItem;
use IikoApi\Domain\Dto\Requests\CreateOrder\OrderItem\ProductOrderItem;
use IikoApi\Domain\Dto\Requests\CreateOrder\Payment\Payment;
use IikoApi\Domain\Dto\Requests\CreateOrder\TipsPayment\TipsPayment;
use IikoApi\Domain\Enums\OrderServiceType;
use Webmozart\Assert\Assert;

class Order extends BaseRequest
{
    /**
     * @param  array<ProductOrderItem|CompoundOrderItem>  $items
     * @param  array<OrderCombo>|null  $combos
     * @param  array<Payment>|null  $payments
     * @param  array<TipsPayment>|null  $tips
     */
    public function __construct(
        public array $items,
        public ?string $menuId = null,
        public ?string $priceCategoryId = null,
        public ?string $id = null, // UUID
        public ?string $externalNumber = null,
        public ?DateTimeInterface $completeBefore = null,
        public ?string $phone = null,
        public ?string $phoneExtension = null,
        public ?string $orderTypeId = null,
        public OrderServiceType $orderServiceType = OrderServiceType::DeliveryByCourier,
        public ?DeliveryPoint $deliveryPoint = null,
        public ?string $comment = null,
        public RegularCustomer|OneTimeCustomer|null $customer = null,
        public ?OrderGuests $guests = null,
        public ?string $marketingSourceId = null,
        public ?string $operatorId = null,
        public ?int $deliveryDuration = null,
        public ?string $deliveryZone = null,
        public ?array $combos = null,
        public ?array $payments = null,
        public ?array $tips = null,
        public ?string $sourceKey = null,
        public ?DiscountsInfo $discountsInfo = null,
        public ?LoyaltyInfo $loyaltyInfo = null,
    ) {
        /* --- массивы --- */
        Assert::minCount($items, 1, 'Не переданы позиции заказа.');
        Assert::nullOrAllIsInstanceOf($combos, OrderCombo::class);
        Assert::nullOrAllIsInstanceOf($payments, Payment::class);
        Assert::nullOrAllIsInstanceOf($tips, TipsPayment::class);

        /* --- строки длиной n --- */
        Assert::nullOrMaxLength($externalNumber, 50);
        Assert::nullOrMaxLength($phone, 40);
        Assert::nullOrMaxLength($phoneExtension, 40);
        Assert::nullOrMaxLength($comment, 300); // пример, уточните лимит
        Assert::nullOrMaxLength($sourceKey, 100);

        /* --- UUID --- */
        Assert::nullOrUuid($id);
        Assert::nullOrUuid($marketingSourceId);
        Assert::nullOrUuid($operatorId);
        Assert::nullOrUuid($orderTypeId);
    }
}
