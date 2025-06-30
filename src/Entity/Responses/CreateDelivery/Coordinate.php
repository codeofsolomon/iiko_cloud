<?php

namespace IikoApi\Entity\Responses\CreateDelivery;

final readonly class Coordinate
{
    public function __construct(
        public float $latitude,
        public float $longitude,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            latitude : (float) $d['latitude'],
            longitude: (float) $d['longitude'],
        );
    }
}

final readonly class City
{
    public function __construct(
        public string $id,
        public string $name,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self($d['id'], $d['name']);
    }
}

final readonly class Region
{
    public function __construct(
        public string $id,
        public string $name,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self($d['id'], $d['name']);
    }
}

final readonly class Street
{
    public function __construct(
        public string $id,
        public string $name,
        public ?City $city = null,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id  : $d['id'],
            name: $d['name'],
            city: isset($d['city']) ? City::fromArray($d['city']) : null,
        );
    }
}

final readonly class DeliveryAddress
{
    public function __construct(
        public ?string $index = null,
        public ?Street $street = null,
        public ?string $house = null,
        public ?string $building = null,
        public ?string $flat = null,
        public ?string $entrance = null,
        public ?string $floor = null,
        public ?string $doorphone = null,
        public ?Region $region = null,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            index    : $d['index'] ?? null,
            street   : isset($d['street']) ? Street::fromArray($d['street']) : null,
            house    : $d['house'] ?? null,
            building : $d['building'] ?? null,
            flat     : $d['flat'] ?? null,
            entrance : $d['entrance'] ?? null,
            floor    : $d['floor'] ?? null,
            doorphone: $d['doorphone'] ?? null,
            region   : isset($d['region']) ? Region::fromArray($d['region']) : null,
        );
    }
}

final readonly class DeliveryPoint
{
    public function __construct(
        public Coordinate $coordinates,
        public ?DeliveryAddress $address = null,
        public ?string $externalCartographyId = null,
        public ?string $comment = null,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            coordinates: Coordinate::fromArray($d['coordinates']),
            address    : isset($d['address']) ? DeliveryAddress::fromArray($d['address']) : null,
            externalCartographyId: $d['externalCartographyId'] ?? null,
            comment    : $d['comment'] ?? null,
        );
    }
}
