<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateDelivery\DeliveryPoint;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use IikoApi\Domain\Enums\OrderAddressType;
use Webmozart\Assert\Assert;

class Address extends BaseRequest
{
    /**
     * @param  string|null  $house  ≤ 100 симв. (≤ 10, если useUaeAddressingSystem=false)
     * @param  string|null  $building  ≤ 10
     * @param  string|null  $flat  ≤ 100
     * @param  string|null  $entrance  ≤ 10
     * @param  string|null  $floor  ≤ 10
     * @param  string|null  $doorphone≤  10
     */
    public function __construct(
        public OrderAddressType $type = OrderAddressType::Legacy,
        public ?AddressStreet $street = null,
        public ?string $index = null,   // ≤ 10
        public ?string $house = null,
        public ?string $building = null,
        public ?string $flat = null,
        public ?string $entrance = null,
        public ?string $floor = null,
        public ?string $doorphone = null,
        public ?string $regionId = null,   // UUID зоны доставки
        public ?string $line1 = null,
    ) {
        Assert::nullOrMaxLength($index, 10);
        Assert::nullOrMaxLength($house, 100);
        Assert::nullOrMaxLength($building, 10);
        Assert::nullOrMaxLength($flat, 100);
        Assert::nullOrMaxLength($entrance, 10);
        Assert::nullOrMaxLength($floor, 10);
        Assert::nullOrMaxLength($doorphone, 10);
        Assert::nullOrUuid($regionId);
    }
}
