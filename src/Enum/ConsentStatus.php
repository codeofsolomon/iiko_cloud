<?php

namespace IikoApi\Enum;

enum ConsentStatus: int
{
    case Unknown = 0;
    case Given    = 1;
    case Revoked  = 2;
}