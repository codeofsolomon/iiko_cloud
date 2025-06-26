<?php

namespace IikoApi\Entity\Responses\Customer;

final readonly class Category
{
    public function __construct(
        public string $id,
        public string $name,
        public bool   $isActive,
        public bool   $isDefaultForNewGuests,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'], $d['name'],
            (bool)$d['isActive'], (bool)$d['isDefaultForNewGuests'],
        );
    }
}