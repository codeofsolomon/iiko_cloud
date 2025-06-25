<?php

namespace IikoApi\Entity\Requests\CreateDelivery\DeliveryPoint;


use IikoApi\Entity\Requests\BaseRequest;
use IikoApi\Enum\OrderAddressType;

class Address extends BaseRequest
{
    /**
     * Street.
     */
    protected ?AddressStreet $street;

    /**
     * Postcode.
     *
     * - [ 0 .. 10 ] characters
     */
    protected ?string $index = null;

    /**
     * House.
     *
     * - [ 0 .. 100 ] characters
     * - In case useUaeAddressingSystem enabled max length - 100, otherwise - 10
     */
    protected ?string $house;

    /**
     * Building.
     *
     * - [ 0 .. 10 ] characters
     */
    protected ?string $building = null;

    /**
     * Apartment.
     *
     * - [ 0 .. 100 ] characters
     * - In case useUaeAddressingSystem enabled max length - 100, otherwise - 10
     */
    protected ?string $flat = null;

    /**
     * Entrance.
     *
     * - [ 0 .. 10 ] characters
     */
    protected ?string $entrance = null;

    /**
     * Floor.
     *
     * - [ 0 .. 10 ] characters
     */
    protected ?string $floor = null;

    /**
     * Intercom.
     *
     * - [ 0 .. 10 ] characters
     */
    protected ?string $doorphone = null;

    /**
     * Delivery area ID.
     */
    protected ?string $regionId = null;

    protected OrderAddressType $type = OrderAddressType::Legacy;


    protected ?string $line1 = null;

    public function __construct(
        OrderAddressType $type = OrderAddressType::Legacy,
        ?AddressStreet $street = null, 
        ?string $house = null,
        ?string $building = null,
        ?string $flat = null,
        ?string $entrance = null,
        ?string $floor = null,
        ?string $doorphone = null,
        ?string $regionId = null,
        ?string $line1 = null,
    )
    {
        $this->type = $type;
        $this->street = $street;
        $this->house = $house ? mb_substr($house, 0, 255) : null;
        $this->building = $building ? mb_substr($building, 0, 10) : null;
        $this->flat = $flat ? mb_substr($flat, 0, 100) : null;
        $this->entrance = $entrance ? mb_substr($entrance, 0, 10) : null;
        $this->floor = $floor ? mb_substr($floor, 0, 10) : null;
        $this->doorphone = $doorphone ? mb_substr($floor, 0, 10) : null;
        $this->regionId = $regionId;
        $this->line1 = $line1;
    }

    public function setStreet(AddressStreet $street): void
    {
        $this->street = $street;
    }

    public function setIndex(?string $index): void
    {
        $this->index = $index;
    }

    public function setHouse(string $house): void
    {
        $this->house = $house;
    }

    public function setBuilding(?string $building): void
    {
        $this->building = $building;
    }

    public function setFlat(?string $flat): void
    {
        $this->flat = $flat;
    }

    public function setEntrance(?string $entrance): void
    {
        $this->entrance = $entrance;
    }

    public function setFloor(?string $floor): void
    {
        $this->floor = $floor;
    }

    public function setDoorphone(?string $doorphone): void
    {
        $this->doorphone = $doorphone;
    }

    public function setRegionId(?string $regionId): void
    {
        $this->regionId = $regionId;
    }
}