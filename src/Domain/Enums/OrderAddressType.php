<?php

namespace IikoApi\Domain\Enums;

enum OrderAddressType: string
{
    case Legacy = 'legacy';
    case City = 'city';
}
