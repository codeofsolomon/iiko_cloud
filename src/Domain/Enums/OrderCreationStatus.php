<?php

namespace IikoApi\Domain\Enums;

enum OrderCreationStatus: string
{
    case Success = 'Success';
    case InProgress = 'InProgress';
    case Error = 'Error';
}
