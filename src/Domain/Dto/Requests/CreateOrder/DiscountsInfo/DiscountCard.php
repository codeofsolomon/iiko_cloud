<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\DiscountsInfo;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

/**
 * Дисконтная карта / карта лояльности, прикладываемая к заказу.
 *
 * • `track` — трек-строка карты (магнитная полоса / штрих-код).
 *   Обязательна, ≤ 255 символов (уточните лимит при необходимости).
 *
 * Объект неизменяем (readonly) и проверяется при создании.
 */
class DiscountCard extends BaseRequest
{
    public function __construct(public string $track)
    {
        Assert::stringNotEmpty($track, 'track обязателен.');
        Assert::maxLength($track, 255, 'track ≤ 255 символов.');
    }
}
