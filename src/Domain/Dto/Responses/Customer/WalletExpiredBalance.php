<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Customer;

final readonly class WalletExpiredBalance
{
    public function __construct(
        public string $expiryDate,  // YYYY-MM-DD
        public float $balance,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self($d['expiryDate'], (float) $d['balance']);
    }
}
