<?php

namespace Src\Entity\Responses\CreateDelivery;

use DateTimeImmutable;

final readonly class CancelCause
{
    public function __construct(
        public string  $id,       // UUID
        public string  $name,     // «Клиент передумал»
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id:      $d['id'],
            name:    $d['name'],
        );
    }
}

/* Информация об отмене конкретного заказа */
final readonly class CancelInfo
{
    public function __construct(
        public CancelCause        $cause,           // справочник
        public DateTimeImmutable  $whenCancelled,   // ISO-8601
        public ?string            $comment = null,  // комментарий к отмене
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            cause:         CancelCause::fromArray($d['cause']),
            whenCancelled: new DateTimeImmutable($d['whenCancelled']),
            comment:       $d['comment'] ?? null,
        );
    }
}