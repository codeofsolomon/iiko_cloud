<?php

namespace IikoApi\Domain\Enums;

enum DeliveryOrderPaymentSetting: string
{
    case WhenOrderOnTheWay = 'WhenOrderOnTheWay';
    case WhenOrderClosed = 'WhenOrderClosed';
}
