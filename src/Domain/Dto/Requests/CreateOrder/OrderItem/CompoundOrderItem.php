<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\OrderItem;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

/**
 * @param  Modifier[]|null  $commonModifiers
 */
class CompoundOrderItem extends BaseRequest
{
    public string $type = 'Compound';

    public function __construct(
        public Component $primaryComponent,
        public float $amount,                  // >0
        public ?Component $secondaryComponent = null,
        public ?array $commonModifiers = null,
        public ?string $productSizeId = null, // UUID
        public ?ComboInformation $comboInformation = null,
        public ?string $comment = null,
    ) {
        Assert::greaterThan($amount, 0);
        Assert::nullOrAllIsInstanceOf($commonModifiers, Modifier::class);
        Assert::nullOrUuid($productSizeId);
        Assert::nullOrMaxLength($comment, 255);
    }
}
