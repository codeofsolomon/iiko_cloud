<?php

namespace IikoApi\Entity\Responses\Customer;

final readonly class WalletExpiredBalance
{
    public function __construct(
        public string $expiryDate,  // YYYY-MM-DD
        public float  $balance,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self($d['expiryDate'], (float)$d['balance']);
    }
}
