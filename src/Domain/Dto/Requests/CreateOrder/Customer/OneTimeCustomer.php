<?php

namespace IikoApi\Domain\Dto\Requests\CreateOrder\Customer;

use IikoApi\Domain\Dto\Requests\BaseRequest;

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
