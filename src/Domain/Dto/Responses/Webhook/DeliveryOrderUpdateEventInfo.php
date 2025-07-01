<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Webhook;

use IikoApi\Domain\Dto\Responses\CreateDelivery\DeliveryOrder;
use IikoApi\Domain\Dto\Responses\CreateDelivery\ErrorInfo;
use IikoApi\Domain\Enums\OrderCreationStatus;

final readonly class DeliveryOrderUpdateEventInfo
{
    public function __construct(
        public string $id,
        public ?string $posId,
        public ?string $externalNumber,
        public string $organizationId,
        public int $timestamp,
        public OrderCreationStatus $creationStatus,
        public ?ErrorInfo $errorInfo,
        public ?DeliveryOrder $order,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['id'],
            $d['posId'] ?? null,
            $d['externalNumber'] ?? null,
            $d['organizationId'],
            (int) $d('timestamp'),
            OrderCreationStatus::from($d['creationStatus']),
            isset($d['errorInfo']) ? ErrorInfo::fromArray($d['errorInfo']) : null,
            isset($d['order']) ? DeliveryOrder::fromArray($d['order']) : null,
        );
    }
}
