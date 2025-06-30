<?php

namespace IikoApi\Domain\Enums;

enum TableOrderStatus: string
{
    case New = 'New';        // только создан
    case Printed = 'Printed';    // отправлен на кухню
    case Cooking = 'Cooking';    // в работе
    case Ready = 'Ready';      // кухня готова
    case Served = 'Served';     // отдан гостю
    case Bill = 'Bill';       // счёт напечатан
    case Closed = 'Closed';     // оплачен
    case Deleted = 'Deleted';    // удалён
    case Unknown = 'Unknown';    // для будущих статусов
}
