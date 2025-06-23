<?php

namespace IikoApi\Enum;

enum PaymentProcessingType: string
{
    case External = 'External';
    case Internal = 'Internal';
    case Both     = 'Both';
}