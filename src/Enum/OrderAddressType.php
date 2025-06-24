<?php

namespace IikoApi\Enum;

enum OrderAddressType: string
{
    case Legacy = 'legacy';
    case City = 'city';
}