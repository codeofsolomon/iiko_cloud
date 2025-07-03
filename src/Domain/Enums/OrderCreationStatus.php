<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum OrderCreationStatus: string implements JsonSerializable
{
    case Success = 'Success';
    case InProgress = 'InProgress';
    case Error = 'Error';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
