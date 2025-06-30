<?php

namespace IikoApi\Domain\Enums;

enum ConsentStatus: int
{
    case Unknown = 0;
    case Given = 1;
    case Revoked = 2;
}
