<?php

namespace IikoApi\Entity\Responses\CreateDelivery;

final readonly class Problem
{
     public function __construct(
        public bool $hasProblem,
        public ?string $description
     ){}


     public static function fromArray(array $d): self
    {
        return new self(
            hasProblem: $d['hasProblem'],
            description: $d['description'] ?? null
        );
    }
}