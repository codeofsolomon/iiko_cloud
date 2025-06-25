<?php

namespace IikoApi\Entity\Responses\Menu;

final readonly class GroupModifier
{
    /** @param ChildModifier[] $childModifiers */
    public function __construct(
        public string $id,
        public int    $minAmount,
        public int    $maxAmount,
        public bool   $required,
        public bool   $childModifiersHaveMinMaxRestrictions,
        public array  $childModifiers,
        public bool   $hideIfDefaultAmount,
        public int    $defaultAmount,
        public bool   $splittable,
        public int    $freeOfChargeAmount,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id:                                   $data['id'],
            minAmount:                            (int) $data['minAmount'],
            maxAmount:                            (int) $data['maxAmount'],
            required:                             (bool) $data['required'],
            childModifiersHaveMinMaxRestrictions: (bool) $data['childModifiersHaveMinMaxRestrictions'],
            childModifiers: array_map(
                ChildModifier::class.'::fromArray',
                $data['childModifiers'] ?? []
            ),
            hideIfDefaultAmount:                  (bool) $data['hideIfDefaultAmount'],
            defaultAmount:                        (int) $data['defaultAmount'],
            splittable:                           (bool) $data['splittable'],
            freeOfChargeAmount:                   (int) $data['freeOfChargeAmount'],
        );
    }
}