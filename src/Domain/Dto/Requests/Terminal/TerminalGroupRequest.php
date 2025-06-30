<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\Terminal;

use IikoApi\Domain\Dto\Requests\MinimalRequest;
use Webmozart\Assert\Assert;

/**
 * /terminals/groups
 *
 * Возвращает терминальные группы организаций.
 *
 * • `organizationIds` — массив UUID-ов организаций
 *   (пустой массив ⇒ «для всех, доступных текущему токену»).
 * • `includeDisabled` — включать ли отключённые группы.
 * • `returnExternalData` — дополнительные ключи (`['country', 'address']` и т. п.).
 *
 * Объект → **immutable** (`readonly`) и валидируется при создании.
 */
class TerminalGroupRequest extends MinimalRequest
{
    /**
     * @param  string[]  $organizationIds
     * @param  string[]  $returnExternalData
     */
    public function __construct(
        public array $organizationIds = [],
        public bool $includeDisabled = false,
        public array $returnExternalData = [],
    ) {
        Assert::allUuid($organizationIds, 'Каждый organizationId должен быть валидным UUID.');
        Assert::allStringNotEmpty($returnExternalData, 'returnExternalData содержит только непустые строки.');

        parent::__construct($organizationIds);
    }
}
