<?php

namespace IikoApi\Domain\Enums;

enum CustomerGender: string
{
    case GENDER_NOT_SPECIFIED = 'NotSpecified';
    case GENDER_MALE = 'Male';
    case GENDER_FEMALE = 'Female';
}
