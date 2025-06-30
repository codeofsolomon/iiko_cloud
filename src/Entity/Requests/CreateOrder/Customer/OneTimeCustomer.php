<?php

namespace IikoApi\Entity\Requests\CreateOrder\Customer;

use IikoApi\Entity\Requests\BaseRequest;

class OneTimeCustomer extends BaseRequest
{
    protected string $type = 'one-time';

    /**
     * Customer name.
     */
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
