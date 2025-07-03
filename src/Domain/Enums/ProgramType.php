<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum ProgramType: int implements JsonSerializable
{
    case DEPOSIT = 0;

    case BONUS = 1;

    case PRODUCT = 2;

    case DISCOUNT = 3;

    case CERTIFICATE = 4;

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
