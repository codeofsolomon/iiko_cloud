<?php

namespace Src\Entity\Requests\CreateDelivery;

use IikoApi\Entity\Requests\BaseRequest;

class OrderGuests extends BaseRequest
{
    /**
     * Number of persons in order. This field defines the number of cutlery sets.
     */
    protected int $count;

    /**
     * Attribute that shows whether order must be split among guests.
     */
    protected bool $splitBetweenPersons;

    public function __construct(int $count)
    {
        $this->count = $count;
    }

    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    public function setSplitBetweenPersons(bool $splitBetweenPersons): void
    {
        $this->splitBetweenPersons = $splitBetweenPersons;
    }
}