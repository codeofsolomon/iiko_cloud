<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum OrderAddressType: string implements JsonSerializable
{
    case Legacy = 'legacy';
    case City = 'city';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
