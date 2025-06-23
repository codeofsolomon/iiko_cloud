<?php

namespace IikoApi\Enum;

enum DiscountMode: string
{
    case Percent     = 'Percent';
    case FlexibleSum = 'FlexibleSum';
    case FixedSum    = 'FixedSum';
}