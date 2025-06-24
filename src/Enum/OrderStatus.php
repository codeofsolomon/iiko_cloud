<?php

namespace IikoApi\Enum;

enum OrderStatus: string
{
    case New     = 'New';
    case Bill    = 'Bill';
    case Closed  = 'Closed';
    case Deleted = 'Deleted';
}