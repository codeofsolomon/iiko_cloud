<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\OrderItem;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

/**
 * Represents a component inside a compound item.
 *
 * @param  Modifier[]|null  $modifiers
 */
class Component extends BaseRequest
{
    public function __construct(
        public string $productId,     // UUID
        public ?array $modifiers = null,
        public ?float $price = null,
        public ?string $positionId = null,
    ) {
        Assert::uuid($productId);
        Assert::nullOrAllIsInstanceOf($modifiers, Modifier::class);
        Assert::nullOrGreaterThanEq($price, 0);
        Assert::nullOrUuid($positionId);
    }
}
