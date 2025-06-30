<?php

namespace IikoApi\Entity\Responses\Webhook;

use DateTimeImmutable;

final readonly class WebhookEvent
{
    public function __construct(
        public string $eventType,
        public DateTimeImmutable $eventTime,
        public string $organizationId,
        public string $correlationId,
        public DeliveryOrderUpdateEventInfo $eventInfo,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            $d['eventType'],
            new DateTimeImmutable($d['eventTime']),
            $d['organizationId'],
            $d['correlationId'],
            DeliveryOrderUpdateEventInfo::fromArray($d['eventInfo'])
        );
    }
}
