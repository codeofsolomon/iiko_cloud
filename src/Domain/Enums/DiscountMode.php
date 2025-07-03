<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum DiscountMode: string implements JsonSerializable
{
    case Percent = 'Percent';
    case FlexibleSum = 'FlexibleSum';
    case FixedSum = 'FixedSum';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
