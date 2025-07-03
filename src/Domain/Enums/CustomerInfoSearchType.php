<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum CustomerInfoSearchType: string implements JsonSerializable
{
    case Phone = 'phone';
    case CardTrack = 'cardTrack';
    case CardNumber = 'cardNumber';
    case Email = 'email';
    case Id = 'id';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
