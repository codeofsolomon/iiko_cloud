<?php

namespace IikoApi\Entity\Responses\CreateDelivery;

use IikoApi\Enum\PaymentTypeKind;

final readonly class PaymentType
{
    public function __construct(
        public string          $id,
        public string          $name,
        public PaymentTypeKind $kind,
       
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id:        $d['id'],
            name:      $d['name'],
            kind:    PaymentTypeKind::from($d['kind']),
           
        );
    }
}