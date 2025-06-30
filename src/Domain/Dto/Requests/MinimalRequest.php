<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests;

use Webmozart\Assert\Assert;

/**
 * Базовый запрос к справочникам iiko (скидки, типы заказов, оплаты и т. д.)
 *
 * • null / пустой массив → данные по всем доступным организациям
 * • объект неизменяем (readonly) — никаких сеттеров не нужно
 * • валидация UUID-ов через webmozart/assert
 */
abstract class MinimalRequest extends BaseRequest
{
    /** @param string[] $organizationIds */
    public function __construct(public array $organizationIds = [])
    {
        Assert::allUuid($organizationIds, 'organizationIds должны быть валидными UUID.');
    }
}
