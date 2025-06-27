<?php

namespace IikoApi\Entity\Responses\Discount;

final readonly class ActionConfig
{
    public function __construct(
        public ?string  $id,
        public ?string  $settings,
        public ?string  $typeName,
        public ?string $checkSum,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'] ?? null,
            $d['settings'] ?? null,
            $d['typeName'] ?? null,
            $d['checkSum'] ?? null,
        );
    }
}