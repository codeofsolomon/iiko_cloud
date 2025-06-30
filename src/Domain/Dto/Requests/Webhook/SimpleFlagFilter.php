<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\Webhook;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

/**
 * Фильтр вида «отправлять/не отправлять».
 *
 * • updates (bool)  — присылать изменения?  (default = true)
 * • errors  (?bool) — присылать ошибки?
 */
class SimpleFlagFilter extends BaseRequest
{
    public function __construct(
        public bool $updates = true,
        public ?bool $errors = null,
    ) {
        Assert::nullOrBoolean($errors);
    }
}
