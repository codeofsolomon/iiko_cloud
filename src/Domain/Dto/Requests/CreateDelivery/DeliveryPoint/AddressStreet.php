<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateDelivery\DeliveryPoint;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

class AddressStreet extends BaseRequest
{
    public function __construct(
        public ?string $classifierId = null,  // ≤ 255
        public ?string $id = null,  // UUID улицы
        public ?string $name = null,  // ≤ 60
        public ?string $city = null,  // ≤ 60
    ) {
        Assert::nullOrMaxLength($classifierId, 255);
        Assert::nullOrUuid($id);
        Assert::nullOrMaxLength($name, 60);
        Assert::nullOrMaxLength($city, 60);
    }
}
