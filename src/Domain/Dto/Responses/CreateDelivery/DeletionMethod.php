<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\CreateDelivery;

final readonly class DeletionMethod
{
    public function __construct(
        public string $id,
        public RemovalType $removalType,
        public ?string $comment,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'],
            RemovalType::fromArray($d['removalType']),
            $d['comment'] ?? null,
        );
    }
}
