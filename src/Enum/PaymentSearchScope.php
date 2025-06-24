<?php

namespace Src\Enum;

enum PaymentSearchScope: string
{
    
    case SEARCH_SCOPE_RESERVED = 'Reserved';
    case SEARCH_SCOPE_PHONE = 'Phone';
    case SEARCH_SCOPE_CARD_NUMBER = 'CardNumber';
    case SEARCH_SCOPE_CARD_TRACK = 'CardTrack';
    case SEARCH_SCOPE_PAYMENT_TOKEN = 'PaymentToken';
    case SEARCH_SCOPE_FIND_FACE_ID = 'FindFaceId';
}