<?php

namespace IikoApi\Enum;

/** Из `/api/1/deliveries/order_types` — три фиксированных значения */
enum OrderServiceType: string
{
    case Common            = 'Common';
    case DeliveryByCourier = 'DeliveryByCourier';
    case DeliveryPickUp    = 'DeliveryPickUp';
}