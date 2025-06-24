<?php

namespace Src\Entity\Responses\CreateDelivery;

use Src\Entity\Responses\CreateDelivery\Person\Guest;
use Src\Entity\Responses\CreateDelivery\Person\Customer;
use Src\Entity\Responses\CreateDelivery\Person\Waiter;
use IikoApi\Enum\OrderStatus;
use DateTimeImmutable;


/**
 * здесь данные о заказе **уже созданном** в iiko
 * Для лаконичности большинство вложенных сущностей оставлены массивами
 * — их можно заменить на собственные DTO (Customer, Item, Combo …),
 * если они у вас уже реализованы.
 *
 * @property array $items          Позиции заказа
 * @property array $payments       Оплаты
 * @property array $combos         Комбо-наборы
 * @property array $tips           Чаевые
 * @property array $discountsInfo  Скидки/наценки
 */
final readonly class DeliveryOrder
{
    /** @param string[]       $tableIds
     *  @param Guest[]        $guests
     *  @param OrderItem[]    $items
     *  @param Combo[]        $combos
     *  @param Payment[]      $payments
     *  @param Tips[]         $tips
     *  @param DiscountInfo[] $discountsInfo
     */
    public function __construct(
        public ?string $parentDeliveryId, //
        public string            $id,
        public string            $orderTypeId,
        public ?string           $externalNumber,
        public array             $tableIds,
        public ?Customer         $customer, //
        public ?string           $phone, //
        public ?string           $phoneExtension, //
        public ?DeliveryPoint    $deliveryPoint, //
        public OrderStatus       $status, //
        public ?CancelInfo     $cancelInfo, //

        public DateTimeImmutable $whenCreated,
        public ?Waiter           $waiter,
        public array             $guests,
        public ?string           $tabName,
        public array             $items,
        public array             $combos,
        public array             $payments,
        public array             $tips,
        public ?string           $sourceKey,
        public ?DateTimeImmutable $whenBillPrinted,
        public ?DateTimeImmutable $whenClosed,
        public ?Conception       $conception,
        public array             $discountsInfo,
        public ?IikoCard5Info    $iikoCard5Info,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            parentDeliveryId: $d['parentDeliveryId'] ?? null,
            id:             $d['id'],
            orderTypeId:    $d['orderTypeId'],
            externalNumber: $d['externalNumber'] ?? null,
            tableIds:       $d['tableIds'] ?? [],
            customer:       isset($d['customer']) ? Customer::fromArray($d['customer']) : null,
            phone:          $d['phone'] ?? null,
            phoneExtension: $d['phoneExtension'] ?? null,
            status:         OrderStatus::from($d['status']),
            whenCreated:    new DateTimeImmutable($d['whenCreated']),
            waiter:         isset($d['waiter']) ? Waiter::fromArray($d['waiter']) : null,
            guests:         array_map(Guest::class.'::fromArray', $d['guests'] ?? []),
            tabName:        $d['tabName'] ?? null,
            items:          array_map(OrderItem::class.'::fromArray', $d['items'] ?? []),
            combos:         array_map(Combo::class.'::fromArray', $d['combos'] ?? []),
            payments:       array_map(Payment::class.'::fromArray', $d['payments'] ?? []),
            tips:           array_map(Tips::class.'::fromArray', $d['tips'] ?? []),
            sourceKey:      $d['sourceKey'] ?? null,
            whenBillPrinted: isset($d['whenBillPrinted']) ? new DateTimeImmutable($d['whenBillPrinted']) : null,
            whenClosed:     isset($d['whenClosed']) ? new DateTimeImmutable($d['whenClosed']) : null,
            conception:     isset($d['conception']) ? Conception::fromArray($d['conception']) : null,
            discountsInfo:  array_map(DiscountInfo::class.'::fromArray', $d['discountsInfo'] ?? []),
            iikoCard5Info:  isset($d['iikoCard5Info']) ? IikoCard5Info::fromArray($d['iikoCard5Info']) : null,
        );
    }
}