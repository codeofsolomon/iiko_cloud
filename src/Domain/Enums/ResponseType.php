<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum ResponseType: string implements JsonSerializable
{
    case Simple = 'Simple';
    case Extended = 'Extended';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
