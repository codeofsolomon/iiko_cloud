<?php

namespace IikoApi\Enum;

enum OrderCreationStatus: string
{
    case Success    = 'Success';
    case InProgress = 'InProgress';
    case Error      = 'Error';
}