<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Customer;

final readonly class CreateOrUpdateCustomerResponse
{
    public function __construct(public string $id) {}

    public static function fromArray(array $d): self
    {
        return new self($d['id']);
    }
}
