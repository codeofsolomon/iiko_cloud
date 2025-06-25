<?php

namespace IikoApi\Entity\Responses\CreateDelivery;


final readonly class Payment
{
    public function __construct(
        public string          $id,
        public PaymentType          $paymentType,
        public bool $isPreliminary,
        public bool $isExternal,
        public float           $sum,
        public bool            $isProcessedExternally,
        public bool $isFiscalizedExternally,
        public bool $isPrepay,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id:        $d['id'],
            paymentType:    PaymentType::fromArray($d['paymentType']),
            isPreliminary: (bool) $d['isPreliminary'],
            isExternal: (bool) $d['isExternal'],
            sum:       (float) $d['sum'],
            isProcessedExternally: (bool) $d['isProcessedExternally'],
            isFiscalizedExternally: (bool) $d['isFiscalizedExternally'],
            isPrepay: (bool) $d['isPrepay'],
        );
    }
}
