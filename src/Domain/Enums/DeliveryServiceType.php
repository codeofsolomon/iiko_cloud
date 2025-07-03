<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum DeliveryServiceType: string implements JsonSerializable
{
    case CourierOnly = 'CourierOnly';
    case SelfServiceOnly = 'SelfServiceOnly';
    case CourierAndSelfService = 'CourierAndSelfService';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
