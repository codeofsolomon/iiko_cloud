<?php

namespace IikoApi\Entity\Responses\Discount;

final readonly class ActionConditionBinding
{
    public function __construct(
        public ?string $id,
        public bool $stopFurtherExecution,
        public array $actions,
        public array $conditions,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'] ?? null,
            (bool) $d['stopFurtherExecution'],
            array_map([ActionConfig::class, 'fromArray'], $d['actions'] ?? []),
            array_map([ActionConfig::class, 'fromArray'], $d['conditions'] ?? []),
        );
    }
}
