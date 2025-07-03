<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum ConsentStatus: int implements JsonSerializable
{
    case Unknown = 0;
    case Given = 1;
    case Revoked = 2;

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
