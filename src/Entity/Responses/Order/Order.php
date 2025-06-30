<?php

namespace IikoApi\Entity\Responses\Order;

use DateTimeImmutable;
use IikoApi\Domain\Enums\OrderStatus;
use IikoApi\Entity\Responses\CreateDelivery\Combo;
use IikoApi\Entity\Responses\CreateDelivery\Conception;
use IikoApi\Entity\Responses\CreateDelivery\DiscountInfo;
use IikoApi\Entity\Responses\CreateDelivery\GuestsInfo;
use IikoApi\Entity\Responses\CreateDelivery\LoyaltyInfo;
use IikoApi\Entity\Responses\CreateDelivery\OrderItem;
use IikoApi\Entity\Responses\CreateDelivery\OrderType;
use IikoApi\Entity\Responses\CreateDelivery\Payment;
use IikoApi\Entity\Responses\CreateDelivery\Person\Customer;
use IikoApi\Entity\Responses\CreateDelivery\Person\Waiter;
use IikoApi\Entity\Responses\CreateDelivery\Tips;

enum SplitOrderBetweenCashRegisters: string
{
    case Disabled = 'Disabled';
    case Allowed = 'Allowed';
    case Required = 'Required';
}

final readonly class Order
{
    public function __construct(
        public array $tableIds, //
        public ?Customer $customer, //
        public ?string $phone, //

        public OrderStatus $status, //

        public DateTimeImmutable $completeBefore,
        public DateTimeImmutable $whenCreated, //

        public ?Waiter $waiter, //
        public ?string $tabName,//
        public ?SplitOrderBetweenCashRegisters $splitOrderBetweenCashRegisters, //

        public ?string $menuId, //

        public float $sum, //
        public int $number, //
        public ?string $sourceKey, //
        public ?GuestsInfo $guestsInfo, //
        public array $items, //
        public array $combos, //
        public array $payments, //
        public array $tips, //
        public ?DateTimeImmutable $whenBillPrinted, //
        public ?DateTimeImmutable $whenClosed, //
        public ?Conception $conception, //
        public array $discounts, //
        public ?string $terminalGroupId, //
        public float $processedPaymentsSum,
        public ?OrderType $orderType, //
        public ?LoyaltyInfo $loyaltyInfo //

    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            tableIds: $d['tableIds'],

            customer: isset($d['customer']) ? Customer::fromArray($d['customer']) : null,
            phone: $d['phone'] ?? null,

            status: OrderStatus::from($d['status']),

            completeBefore: new DateTimeImmutable($d['completeBefore']),
            whenCreated: new DateTimeImmutable($d['whenCreated']),

            waiter: isset($d['waiter']) ? Waiter::fromArray($d['waiter']) : null,
            tabName: $d['tabName'] ?? null,
            splitOrderBetweenCashRegisters: isset($d['splitOrderBetweenCashRegisters']) ? SplitOrderBetweenCashRegisters::from($d['splitOrderBetweenCashRegisters']) : null,

            menuId: $d['menuId'] ?? null,

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
