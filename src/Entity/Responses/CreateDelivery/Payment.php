<?php

namespace Src\Entity\Responses\CreateDelivery;

use IikoApi\Enum\PaymentTypeKind;

final readonly class Payment
{
    public function __construct(
        public string          $id,
        public string          $paymentTypeId,
        public PaymentTypeKind $paymentTypeKind,
        public float           $sum,
        public bool            $isProcessedExternally,
        public ?string         $additionalData = null,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id:        $d['id'],
            paymentTypeId:      $d['paymentTypeId'],
            paymentTypeKind:    PaymentTypeKind::from($d['paymentTypeKind']),
            sum:       (float) $d['sum'],
            isProcessedExternally: (bool) $d['isProcessedExternally'],
            additionalData: $d['additionalData'] ?? null,
        );
    }
}
