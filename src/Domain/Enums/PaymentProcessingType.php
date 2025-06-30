<?php

namespace IikoApi\Domain\Enums;

enum PaymentProcessingType: string
{
    case External = 'External';
    case Internal = 'Internal';
    case Both = 'Both';
}
