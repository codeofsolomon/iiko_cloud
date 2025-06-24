<?php

namespace Src\Entity\Requests\CreateDelivery\DeliveryPoint;


use IikoApi\Entity\Requests\BaseRequest;

class Coordinates extends BaseRequest
{
    /**
     * Latitude.
     */
    protected float $latitude;

    /**
     * Longitude.
     */
    protected float $longitude;

    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }
}