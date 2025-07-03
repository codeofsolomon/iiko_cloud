<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum CustomerGender: string implements JsonSerializable
{
    case GENDER_NOT_SPECIFIED = 'NotSpecified';
    case GENDER_MALE = 'Male';
    case GENDER_FEMALE = 'Female';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
