<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\LoyaltyCalculation;

final readonly class WalletInfo
{
    public function __construct(
        public string $id,
        public float $maxSum,
        public bool $canHoldMoney,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'], (float) $d['maxSum'], (bool) $d['canHoldMoney']
        );
    }
}
