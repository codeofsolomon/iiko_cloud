<?php

namespace IikoApi\Domain\Enums;

enum ProgramType: int
{
    case DEPOSIT = 0;

    case BONUS = 1;

    case PRODUCT = 2;

    case DISCOUNT = 3;

    case CERTIFICATE = 4;
}
