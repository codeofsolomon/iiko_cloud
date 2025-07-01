<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Address;

final readonly class StreetClassifier
{
    public function __construct(
        public string $id,
        public string $streetName,
        public string $cityId,
        public string $cityName,
        public ?string $classifierId
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'],
            $d['streetName'],
            $d['cityId'],
            $d['cityName'],
            $d['classifierId'] ?? null
        );
    }
}
