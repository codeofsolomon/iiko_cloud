<?php

namespace IikoApi\Entity\Responses\Customer;

enum WalletType: int    
{
    case DepositOrCorporate  = 0;
    case Bonus     = 1;
    case Products   = 2;
    case Discount    = 3;
    case Certificate     = 4;
}

final readonly class WalletBalance
{
    /** @param WalletExpiredBalance[]|null $expiredBalances */
    public function __construct(
        public string       $id,
        public string       $name,
        public WalletType   $type,
        public float        $balance,
        public ?array       $expiredBalances,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'],
            $d['name'],
            WalletType::from($d['type']),
            (float)$d['balance'],
            isset($d['expiredBalances'])
                ? array_map([WalletExpiredBalance::class,'fromArray'], $d['expiredBalances'])
                : null,
        );
    }
}
