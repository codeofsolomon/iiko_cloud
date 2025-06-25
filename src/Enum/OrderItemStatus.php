<?php

namespace IikoApi\Enum;

enum OrderItemStatus: string
{
    case Added               = 'Added';
    case PrintedNotCooking   = 'PrintedNotCooking';
    case CookingStarted      = 'CookingStarted';
    case CookingCompleted    = 'CookingCompleted';
    case Served              = 'Served';
}