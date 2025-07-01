<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\OrderItem;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

class ComboInformation extends BaseRequest
{
    public function __construct(
        public string $comboId,          // UUID
        public string $comboSourceId,    // UUID of action
        public string $comboGroupId,     // UUID of group
        public ?string $comboGroupName = null,
    ) {
        Assert::uuid($comboId);
        Assert::uuid($comboSourceId);
        Assert::uuid($comboGroupId);
        Assert::nullOrMaxLength($comboGroupName, 255);
    }
}
