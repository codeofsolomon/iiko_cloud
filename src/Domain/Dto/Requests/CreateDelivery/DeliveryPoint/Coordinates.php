<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateDelivery\DeliveryPoint;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

class Coordinates extends BaseRequest
{
    public function __construct(
        public float $latitude,   // –90 … 90
        public float $longitude,  // –180 … 180
    ) {
        Assert::range($latitude, -90, 90, 'latitude должна быть в диапазоне -90…90');
        Assert::range($longitude, -180, 180, 'longitude должна быть в диапазоне -180…180');
    }
}
