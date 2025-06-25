<?php

namespace Src\Entity\Responses\CreateDelivery;

use DateTimeImmutable;
use IikoApi\Enum\OrderItemStatus;

final readonly class ServiceOrderItem extends OrderItem
{
    public function __construct(
        string               $type,
        OrderItemStatus      $status,
        ?ItemDeletedInfo     $deleted,
        float                $amount,
        ?string              $comment,
        ?DateTimeImmutable   $whenPrinted,
        ?ProductSize         $size,
        ?ComboItemInformation $comboInformation,
        public Product       $service,
        public float         $cost,
    ) {
        parent::__construct(...func_get_args());
    }

    public static function fromArray(array $d): self
    {
        [ $type, $status, $deleted, $amount, $comment,
          $whenPrinted, $size, $comboInfo ] = parent::baseFromArray($d);

        return new self(
            $type, $status, $deleted, $amount, $comment, $whenPrinted, $size, $comboInfo,
            Product::fromArray($d['service']),
            (float) $d['cost'],
        );
    }
}