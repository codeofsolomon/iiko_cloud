<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Discount;

final readonly class ProgramsResponse
{
    public function __construct(public array $programs) {}

    public static function fromArray(array $d): self
    {
        return new self(
            array_map([ProgramItem::class, 'fromArray'], $d['Programs'] ?? [])
        );
    }
}
