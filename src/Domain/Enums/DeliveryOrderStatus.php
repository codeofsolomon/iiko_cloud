<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum DeliveryOrderStatus: string implements JsonSerializable
{
    case Unconfirmed = 'Unconfirmed';          // оператор ещё не принял
    case WaitCooking = 'WaitCooking';          // очередь на кухню
    case Cooking = 'Cooking';              // готовится
    case Ready = 'Ready';                // готов, ждёт курьера/самовывоза
    case OnWay = 'OnWay';                // курьер в пути
    case Delivered = 'Delivered';            // передано гостю
    case Closed = 'Closed';               // чек закрыт (оплачен)
    case Cancelled = 'Cancelled';            // отменён
    case NotDelivered = 'NotDelivered';         // возврат
    case NotAccepted = 'NotAccepted';          // ресторан отклонил
    case Bill = 'Bill';                 // счёт напечатан, но не закрыт
    case Unknown = 'Unknown';              // резерв на будущее

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
