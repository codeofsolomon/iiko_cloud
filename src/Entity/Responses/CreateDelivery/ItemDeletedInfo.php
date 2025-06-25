<?php

namespace IikoApi\Entity\Responses\CreateDelivery;


final readonly class ItemDeletedInfo
{
    public function __construct(public DeletionMethod $deletionMethod) {}

    public static function fromArray(array $d): self
    {
        return new self(DeletionMethod::fromArray($d['deletionMethod']));
    }
}