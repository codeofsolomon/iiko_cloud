<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum AddressFormatType: string implements JsonSerializable
{
    case Legacy = 'Legacy';
    case City = 'City';
    case International = 'International';
    case IntNoPostcode = 'IntNoPostcode';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
