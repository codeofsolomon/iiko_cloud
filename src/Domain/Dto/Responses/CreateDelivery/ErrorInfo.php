<?php

namespace IikoApi\Domain\Dto\Responses\CreateDelivery;

use IikoApi\Domain\Enums\ErrorOrderInfoCode;

final readonly class ErrorInfo
{
    public function __construct(
        public ErrorOrderInfoCode $code,
        public string $message,

    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            code: ErrorOrderInfoCode::from($d['code']),
            message: $d['message'],

        );
    }
}
