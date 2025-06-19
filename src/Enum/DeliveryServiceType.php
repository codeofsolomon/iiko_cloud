<?php

namespace IikoApi\Enum;

enum DeliveryServiceType: string
{
    case CourierOnly = 'CourierOnly';
    case SelfServiceOnly = 'SelfServiceOnly';
    case CourierAndSelfService = 'CourierAndSelfService';
}