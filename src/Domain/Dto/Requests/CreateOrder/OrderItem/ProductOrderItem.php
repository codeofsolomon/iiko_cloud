<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\OrderItem;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

/**
 * @param  Modifier[]|null  $modifiers
 */
class ProductOrderItem extends BaseRequest
{
    public string $type = 'Product';

    public function __construct(
        public string $productId,          // UUID
        public float $amount,             // >0
        public ?array $modifiers = null,
        public ?float $price = null,
        public ?string $positionId = null, // UUID
        public ?string $productSizeId = null, // UUID
        public ?ComboInformation $comboInformation = null,
        public ?string $comment = null,
    ) {
        Assert::uuid($productId);
        Assert::greaterThan($amount, 0);
        Assert::nullOrAllIsInstanceOf($modifiers, Modifier::class);
        Assert::nullOrGreaterThanEq($price, 0);
        Assert::nullOrUuid($positionId);
        Assert::nullOrUuid($productSizeId);
        Assert::nullOrMaxLength($comment, 255);
    }
}
