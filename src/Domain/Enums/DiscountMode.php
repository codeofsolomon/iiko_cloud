<?php

namespace IikoApi\Domain\Enums;

enum DiscountMode: string
{
    case Percent = 'Percent';
    case FlexibleSum = 'FlexibleSum';
    case FixedSum = 'FixedSum';
}
