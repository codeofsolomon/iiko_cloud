<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

enum OrderItemStatus: string implements JsonSerializable
{
    case Added = 'Added';               // только добавлен
    case PrintedNotCooking = 'PrintedNotCooking';   // в чек-ленте, ещё не готовится
    case CookingStarted = 'CookingStarted';      // готовится
    case CookingCompleted = 'CookingCompleted';    // готов
    case Served = 'Served';              // подано гостю
    case Removed = 'Removed';             // удалено из заказа
    case Modified = 'Modified';            // изменено (кол-во/мод)
    case Replaced = 'Replaced';            // заменено другим продуктом
    case Unknown = 'Unknown';             // на будущее

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
