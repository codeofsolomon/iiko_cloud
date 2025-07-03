<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

/** Из `/api/1/deliveries/order_types` — три фиксированных значения */
enum OrderServiceType: string implements JsonSerializable
{
    case Common = 'Common';
    case DeliveryByCourier = 'DeliveryByCourier';
    case DeliveryByClient = 'DeliveryByClient';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
