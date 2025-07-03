<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum AddressLookupService: string implements JsonSerializable
{
    case DaData = 'DaData';
    case GetAddress = 'GetAddress';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
