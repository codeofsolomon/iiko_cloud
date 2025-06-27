<?php

namespace IikoApi\Enum;

enum ProgramTemplateType: int
{
    case NONE  = 0;

    case BONUS = 1;

    case DISCOUNT = 2;

    case NTHDISH = 3;

    case ManualOrderAnonymousDiscount = 4;

    case AutoOrderAnonymousDiscount = 5;

    case AutoDishAnonymousDiscount = 6;

    case PromotionsProgram = 7;

    case NthDishPromotionsProgram = 8;
}