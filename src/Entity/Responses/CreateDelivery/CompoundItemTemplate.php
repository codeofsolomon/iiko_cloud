<?php

namespace IikoApi\Entity\Responses\CreateDelivery;

final readonly class CompoundItemTemplate
{
    /* id & name – аналог Product */
    public function __construct(public string $id, public string $name) {}

    public static function fromArray(array $d): self
    {
        return new self($d['id'], $d['name']);
    }
}
