<?php

namespace IikoApi\Entity\Responses\LoyaltyCalculation;

final readonly class WarningItem
{
    public function __construct(
        public string $code,
        public string $errorCode,
        public string $message,
    ) {}
    public static function fromArray(array $d): self
    {
        return new self($d['Code'], $d['ErrorCode'], $d['Message']);
    }
}