<?php

namespace IikoApi\Entity\Responses\CreateDelivery\Person;

use IikoApi\Enum\CustomerGender;

readonly class Person
{
    public function __construct(
        public string  $id,
        public ?string $name     = null,
        public ?string $surname  = null,
        public ?string $phone    = null,
        public ?string $comment  = null,
        public CustomerGender $gender = CustomerGender::GENDER_NOT_SPECIFIED,
        public ?bool $inBlacklist = null,
        public ?string $birthdate = null,
        public string $type
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id:      $d['id'],
            name:    $d['name']    ?? null,
            surname: $d['surname'] ?? null,
            phone:   $d['phone']   ?? null,
            comment: $d['comment'] ?? null,
            gender: CustomerGender::from($d['gender']),
            inBlacklist: isset($d['inBlacklist']) ? $d['inBlacklist'] : null,
            birthdate: isset($d['birthdate']) ? $d['birthdate'] : null,
            type: $d['type']
        );
    }
}