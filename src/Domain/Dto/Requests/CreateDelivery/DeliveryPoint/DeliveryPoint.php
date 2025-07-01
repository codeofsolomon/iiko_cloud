<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateDelivery\DeliveryPoint;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

class DeliveryPoint extends BaseRequest
{
    /**
     * @param  string|null  $externalCartographyId  ≤ 100
     * @param  string|null  $comment  ≤ 500
     */
    public function __construct(
        public ?Coordinates $coordinates = null,
        public ?Address $address = null,
        public ?string $externalCartographyId = null,
        public ?string $comment = null,
    ) {
        Assert::nullOrMaxLength($externalCartographyId, 100);
        Assert::nullOrMaxLength($comment, 500);
    }
}
