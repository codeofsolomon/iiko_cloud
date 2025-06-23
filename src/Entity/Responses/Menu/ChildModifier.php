<?php

namespace Src\Entity\Responses\Menu;

final readonly class ChildModifier
{
    public function __construct(
        public string $id,
        public int    $defaultAmount,
        public int    $minAmount,
        public int    $maxAmount,
        public bool   $required,
        public bool   $hideIfDefaultAmount,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id:                 $data['id'],
            defaultAmount:      (int) $data['defaultAmount'],
            minAmount:          (int) $data['minAmount'],
            maxAmount:          (int) $data['maxAmount'],
            required:           (bool) $data['required'],
            hideIfDefaultAmount:(bool) $data['hideIfDefaultAmount'],
        );
    }
}