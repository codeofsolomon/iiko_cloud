<?php

namespace IikoApi\Entity\Responses\CreateDelivery;

final readonly class CourierInfo
{
    public function __construct(
        public Courier  $courier, 
        public bool $isCourierSelectedManually,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            courier:             Courier::fromArray($d['courier']),
            isCourierSelectedManually:  (bool) ($d['isCourierSelectedManually'] ?? false),
        );
    }
}