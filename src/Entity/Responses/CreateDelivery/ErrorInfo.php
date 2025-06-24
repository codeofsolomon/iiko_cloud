<?php

namespace Src\Entity\Responses\CreateDelivery;

use IikoApi\Enum\ErrorOrderInfoCode;

final readonly class ErrorInfo
{
    public function __construct(
        public ErrorOrderInfoCode $code,
        public string        $message,
        
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            code:        ErrorOrderInfoCode::from($d['code']),
            message:     $d['message'],
            
        );
    }
}