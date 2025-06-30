<?php

namespace IikoApi\Domain\Enums;

enum DeliveryServiceType: string
{
    case CourierOnly = 'CourierOnly';
    case SelfServiceOnly = 'SelfServiceOnly';
    case CourierAndSelfService = 'CourierAndSelfService';
}
