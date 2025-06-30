<?php

namespace IikoApi\Domain\Dto\Responses\CreateDelivery\Person;

use IikoApi\Domain\Enums\CustomerGender;

readonly class Person
{
    public function __construct(
        public string $id,
        public ?string $name,
        public ?string $surname,
        public ?string $phone,
        public ?string $comment,
        public CustomerGender $gender,
        public ?bool $inBlacklist,
        public ?string $birthdate,
        public string $type
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id: $d['id'],
            name: $d['name'] ?? null,
            surname: $d['surname'] ?? null,
            phone: $d['phone'] ?? null,
            comment: $d['comment'] ?? null,
            gender: CustomerGender::from($d['gender']),
            inBlacklist: isset($d['inBlacklist']) ? $d['inBlacklist'] : null,
            birthdate: isset($d['birthdate']) ? $d['birthdate'] : null,
            type: $d['type']
        );
    }
}
