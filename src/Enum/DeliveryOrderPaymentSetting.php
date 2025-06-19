<?php

namespace IikoApi\Enum;

enum DeliveryOrderPaymentSetting: string
{
    case WhenOrderOnTheWay = 'WhenOrderOnTheWay';
    case WhenOrderClosed = 'WhenOrderClosed';
}