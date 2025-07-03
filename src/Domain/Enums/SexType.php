<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum SexType: int implements JsonSerializable
{
    case Unknown = 0;
    case Male = 1;
    case Female = 2;

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
