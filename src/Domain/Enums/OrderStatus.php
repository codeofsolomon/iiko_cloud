<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum OrderStatus: string implements JsonSerializable
{
    case New = 'New';
    case Bill = 'Bill';
    case Closed = 'Closed';
    case Deleted = 'Deleted';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
