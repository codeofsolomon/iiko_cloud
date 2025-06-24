<?php

namespace Src\Entity\Responses\CreateDelivery;


enum TipsType: string { case Cash='Cash'; case Card='Card'; case External='External'; }

final readonly class Tips
{
    public function __construct(
        public string   $id,
        public TipsType $type,
        public float    $sum,
        public ?float   $percentage = null,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id:    $d['id'],
            type:  TipsType::from($d['type']),
            sum:   (float) $d['sum'],
            percentage: isset($d['percentage']) ? (float) $d['percentage'] : null,
        );
    }
}