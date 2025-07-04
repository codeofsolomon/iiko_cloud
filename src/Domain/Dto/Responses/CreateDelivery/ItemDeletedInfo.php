<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\CreateDelivery;

final readonly class ItemDeletedInfo
{
    public function __construct(public DeletionMethod $deletionMethod) {}

    public static function fromArray(array $d): self
    {
        return new self(DeletionMethod::fromArray($d['deletionMethod']));
    }
}
