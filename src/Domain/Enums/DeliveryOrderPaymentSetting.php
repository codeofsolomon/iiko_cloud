<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum DeliveryOrderPaymentSetting: string implements JsonSerializable
{
    case WhenOrderOnTheWay = 'WhenOrderOnTheWay';
    case WhenOrderClosed = 'WhenOrderClosed';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
