<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Dictionary;

/** @property TerminalGroupItem[] $items */
final readonly class TerminalGroup
{
    public function __construct(
        public string $organizationId,
        public array $items,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            organizationId: $d['organizationId'],
            items: array_map(TerminalGroupItem::class.'::fromArray', $d['items'] ?? []),
        );
    }
}
