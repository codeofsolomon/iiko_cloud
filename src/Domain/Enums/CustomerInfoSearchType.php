<?php

namespace IikoApi\Domain\Enums;

enum CustomerInfoSearchType: string
{
    case Phone = 'phone';
    case CardTrack = 'cardTrack';
    case CardNumber = 'cardNumber';
    case Email = 'email';
    case Id = 'id';
}
