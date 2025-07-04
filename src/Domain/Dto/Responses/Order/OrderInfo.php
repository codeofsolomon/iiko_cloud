<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Order;

use IikoApi\Domain\Dto\Responses\CreateDelivery\ErrorInfo;
use IikoApi\Domain\Enums\OrderCreationStatus;

final readonly class OrderInfo
{
    public function __construct(
        public string $id,
        public ?string $posId,
        public ?string $externalNumber,
        public string $organizationId,
        public int $timestamp,
        public OrderCreationStatus $creationStatus,
        public ?ErrorInfo $errorInfo,
        public ?Order $order,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id: $d['id'],
            posId: $d['posId'] ?? null,
            externalNumber: $d['externalNumber'] ?? null,
            organizationId: $d['organizationId'],
            timestamp: (int) $d['timestamp'],
            creationStatus: OrderCreationStatus::from($d['creationStatus']),
            errorInfo: isset($d['errorInfo']) ? ErrorInfo::fromArray($d['errorInfo']) : null,
            order: isset($d['order']) ? Order::fromArray($d['order']) : null,
        );
    }
}
