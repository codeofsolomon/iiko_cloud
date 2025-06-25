<?php

namespace IikoApi\Entity\Responses\Menu;

final readonly class Group
{
    public function __construct(
        public string  $id,
        public string  $code,
        public string  $name,
        public ?string $description,
        public ?string $additionalInfo,
        public ?string $parentGroup,
        public int     $order,
        public bool    $isIncludedInMenu,
        public bool    $isGroupModifier,
        /** @var string[] */
        public array   $imageLinks = [],
        /** @var string[] */
        public array   $tags       = [],
        public bool    $isDeleted  = false,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id:               $data['id'],
            code:             $data['code'],
            name:             $data['name'],
            description:      $data['description']      ?? null,
            additionalInfo:   $data['additionalInfo']   ?? null,
            parentGroup:      $data['parentGroup']      ?? null,
            order:            (int)   ($data['order']            ?? 0),
            isIncludedInMenu: (bool)  ($data['isIncludedInMenu'] ?? true),
            isGroupModifier:  (bool)  ($data['isGroupModifier']  ?? false),
            imageLinks:       $data['imageLinks']  ?? [],
            tags:             $data['tags']        ?? [],
            isDeleted:        (bool)  ($data['isDeleted']        ?? false),
        );
    }
}