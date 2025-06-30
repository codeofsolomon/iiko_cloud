<?php

namespace IikoApi\Entity\Responses\CreateDelivery;

use DateTimeImmutable;
use IikoApi\Domain\Enums\OrderStatus;
use IikoApi\Entity\Responses\CreateDelivery\Person\Customer;
use IikoApi\Entity\Responses\CreateDelivery\Person\Guest;
use IikoApi\Entity\Responses\CreateDelivery\Person\Waiter;

final readonly class DeliveryOrder
{
    /** @param string[]       $tableIds
     * @param  Guest[]  $guests
     * @param  OrderItem[]  $items
     * @param  Combo[]  $combos
     * @param  Payment[]  $payments
     * @param  Tips[]  $tips
     * @param  DiscountInfo[]  $discountsInfo
     */
    public function __construct(
        public ?string $parentDeliveryId,
        public ?Customer $customer,
        public ?string $phone,
        public ?string $phoneExtension,
        public ?DeliveryPoint $deliveryPoint,
        public OrderStatus $status,
        public ?CancelInfo $cancelInfo,
        public ?CourierInfo $courierInfo,
        public DateTimeImmutable $completeBefore,
        public DateTimeImmutable $whenCreated,
        public ?DateTimeImmutable $whenConfirmed,
        public ?DateTimeImmutable $whenPrinted,
        public ?DateTimeImmutable $whenCookingCompleted,
        public ?DateTimeImmutable $whenSended,
        public ?DateTimeImmutable $whenDelivered,
        public ?string $comment,
        public ?Problem $problem,
        public ?Waiter $operator,
        public ?int $deliveryDuration,
        public ?int $indexInCourierRoute,
        public DateTimeImmutable $cookingStartTime,
        public ?string $movedFromDeliveryId,
        public ?string $movedFromTerminalGroupId,
        public ?string $movedFromOrganizationId,
        public ?ExternalCourierService $externalCourierService,
        public ?string $movedToDeliveryId,
        public ?string $movedToTerminalGroupId,
        public ?string $movedToOrganizationId,
        public ?string $menuId,
        public ?string $deliveryZone,
        public ?DateTimeImmutable $estimatedTime,
        public ?bool $isAsap,
        public ?DateTimeImmutable $whenPacked,
        public float $sum,
        public int $number,
        public ?string $sourceKey,
        public ?GuestsInfo $guestsInfo,
        public array $items,
        public array $combos,
        public array $payments,
        public array $tips,
        public ?DateTimeImmutable $whenBillPrinted,
        public ?DateTimeImmutable $whenClosed,
        public ?Conception $conception,
        public array $discounts,
        public ?string $terminalGroupId,
        public float $processedPaymentsSum,
        public ?OrderType $orderType,
        public ?LoyaltyInfo $loyaltyInfo

    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            parentDeliveryId: $d['parentDeliveryId'] ?? null,
            customer: isset($d['customer']) ? Customer::fromArray($d['customer']) : null,
            phone: $d['phone'] ?? null,
            phoneExtension: $d['phoneExtension'] ?? null,
            deliveryPoint: isset($d['deliveryPoint']) ? DeliveryPoint::fromArray($d['deliveryPoint']) : null,
            status: OrderStatus::from($d['status']),
            cancelInfo: isset($d['cancelInfo']) ? CancelInfo::fromArray($d['cancelInfo']) : null,
            courierInfo: isset($d['courierInfo']) ? CourierInfo::fromArray($d['courierInfo']) : null,
            completeBefore: new DateTimeImmutable($d['completeBefore']),
            whenCreated: new DateTimeImmutable($d['whenCreated']),
            whenConfirmed: isset($d['whenConfirmed']) ? new DateTimeImmutable($d['whenConfirmed']) : null,
            whenPrinted: isset($d['whenPrinted']) ? new DateTimeImmutable($d['whenPrinted']) : null,
            whenCookingCompleted: isset($d['whenCookingCompleted']) ? new DateTimeImmutable($d['whenCookingCompleted']) : null,
            whenSended: isset($d['whenSended']) ? new DateTimeImmutable($d['whenSended']) : null,
            whenDelivered: isset($d['whenDelivered']) ? new DateTimeImmutable($d['whenDelivered']) : null,
            comment: $d['comment'] ?? null,
            problem: isset($d['problem']) ? Problem::fromArray($d['problem']) : null,
            operator: isset($d['operator']) ? Waiter::fromArray($d['operator']) : null,
            deliveryDuration: $d['deliveryDuration'] ?? null,
            indexInCourierRoute: $d['indexInCourierRoute'] ?? null,
            cookingStartTime: new DateTimeImmutable($d['cookingStartTime']),
            movedFromDeliveryId: $d['movedFromDeliveryId'] ?? null,
            movedFromTerminalGroupId: $d['movedFromTerminalGroupId'] ?? null,
            movedFromOrganizationId: $d['movedFromOrganizationId'] ?? null,
            externalCourierService: isset($d['externalCourierService']) ? ExternalCourierService::fromArray($d['externalCourierService']) : null,
            movedToDeliveryId: $d['movedToDeliveryId'] ?? null,
            movedToTerminalGroupId: $d['movedToTerminalGroupId'] ?? null,
            movedToOrganizationId: $d['movedToOrganizationId'] ?? null,
            menuId: $d['menuId'] ?? null,
            deliveryZone: $d['deliveryZone'] ?? null,
            estimatedTime: isset($d['estimatedTime']) ? new DateTimeImmutable($d['estimatedTime']) : null,
            isAsap: $d['isAsap'] ?? null,
            whenPacked: isset($d['whenPacked']) ? new DateTimeImmutable($d['whenPacked']) : null,
            sum: (float) $d['sum'],
            number: $d['number'],
            sourceKey: $d['sourceKey'] ?? null,
            guestsInfo: isset($d['guestsInfo']) ? GuestsInfo::fromArray($d['guestsInfo']) : null,
            items: array_map(OrderItem::class.'::fromArray', $d['items'] ?? []),
            combos: array_map(Combo::class.'::fromArray', $d['combos'] ?? []),
            payments: array_map(Payment::class.'::fromArray', $d['payments'] ?? []),
            tips: array_map(Tips::class.'::fromArray', $d['tips'] ?? []),
            whenBillPrinted: isset($d['whenBillPrinted']) ? new DateTimeImmutable($d['whenBillPrinted']) : null,
            whenClosed: isset($d['whenClosed']) ? new DateTimeImmutable($d['whenClosed']) : null,
            conception: isset($d['conception']) ? Conception::fromArray($d['conception']) : null,
            discounts: array_map(DiscountInfo::class.'::fromArray', $d['discountsInfo'] ?? []),
            terminalGroupId: isset($d['terminalGroupId']) ? $d['terminalGroupId'] : null,
            processedPaymentsSum: (float) $d['processedPaymentsSum'] ?? null,
            orderType: isset($d['orderType']) ? OrderType::fromArray($d['orderType']) : null,
            loyaltyInfo: isset($d['loyaltyInfo']) ? LoyaltyInfo::fromArray($d['loyaltyInfo']) : null,
        );
    }
}
