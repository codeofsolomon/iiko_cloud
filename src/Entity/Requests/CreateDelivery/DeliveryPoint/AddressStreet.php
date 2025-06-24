<?php

namespace Src\Entity\Requests\CreateDelivery\DeliveryPoint;


use IikoApi\Entity\Requests\BaseRequest;

class AddressStreet extends BaseRequest
{
    /**
     * Street ID in classifier, e.g., address database.
     *
     * - [ 0 .. 255 ] characters
     */
    protected ?string $classifierId = null;

    /**
     * ID.
     *
     * Can be obtained by /api/1/streets/by_city operation.
     */
    protected ?string $id = null;

    /**
     * Name.
     *
     * [ 0 .. 60 ] characters
     */
    protected ?string $name = null;

    /**
     * City name.
     *
     * [ 0 .. 60 ] characters
     */
    protected ?string $city = null;

    public function __construct(
        ?string $classifierId = null,
        ?string $id = null,
        ?string $name = null,
        ?string $city = null
    )
    {
        $this->classifierId = $classifierId ? mb_substr($classifierId, 0, length: 255) : null;
        $this->id = $id;
        $this->name = $name ? mb_substr($name, 0, 60) : null;
        $this->city = $city ? mb_substr($city, 0, 60) : null;
    }

    public function setClassifierId(?string $classifierId): void
    {
        $this->classifierId = $classifierId;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }
}