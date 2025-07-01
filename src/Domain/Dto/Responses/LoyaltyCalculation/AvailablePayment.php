<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\LoyaltyCalculation;

final readonly class AvailablePayment
{
    /** @param WalletInfo[] $walletInfos */
    public function __construct(
        public string $id,
        public float $maxSum,
        public int $order,
        public array $walletInfos,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'],
            (float) $d['maxSum'],
            (int) $d['order'],
            array_map([WalletInfo::class, 'fromArray'], $d['walletInfos'] ?? []),
        );
    }
}
