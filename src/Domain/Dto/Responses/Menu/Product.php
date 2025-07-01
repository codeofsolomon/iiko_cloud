<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Responses\Menu;

/**
 * Полная модель Product из /api/1/nomenclature
 *
 * @property SizePrice[] $sizePrices
 * @property Modifier[] $modifiers
 * @property GroupModifier[] $groupModifiers
 * @property string[] $tags
 * @property string[] $imageLinks
 */
final readonly class Product
{
    public function __construct(
        // базовые
        public string $id,
        public string $code,
        public string $name,
        public ?string $description,
        public ?string $additionalInfo,
        /** @var string[] */ public array $tags,
        public ?string $parentGroup,
        public ?int $order,

        // классификация
        public ?string $type,
        public ?string $orderItemType,
        public ?string $groupId,
        public ?string $productCategoryId,

        // модификаторы / размеры
        public ?string $modifierSchemaId,
        public ?string $modifierSchemaName,
        public ?bool $splittable,
        /** @var SizePrice[] */ public array $sizePrices,
        /** @var Modifier[] */ public array $modifiers,
        /** @var GroupModifier[] */ public array $groupModifiers,

        // визуал
        /** @var string[] */ public array $imageLinks,
        public ?string $fullNameEnglish,
        public ?bool $doNotPrintInCheque,

        // учёт-флаги
        public ?bool $useBalanceForSell,
        public ?bool $canSetOpenPrice,
        public ?bool $isDeleted,

        // питательные значения / вес
        public ?float $fatAmount,
        public ?float $proteinsAmount,
        public ?float $carbohydratesAmount,
        public ?float $energyAmount,
        public ?float $fatFullAmount,
        public ?float $proteinsFullAmount,
        public ?float $carbohydratesFullAmount,
        public ?float $energyFullAmount,
        public ?int $weight,
        public ?string $measureUnit,

        // SEO
        public ?string $seoDescription,
        public ?string $seoText,
        public ?string $seoKeywords,
        public ?string $seoTitle,
    ) {}

    public static function fromArray(array $d): self
    {
        return new self(
            id: $d['id'],
            code: $d['code'],
            name: $d['name'],
            description: $d['description'] ?? null,
            additionalInfo: $d['additionalInfo'] ?? null,
            tags: $d['tags'] ?? [],
            parentGroup: $d['parentGroup'] ?? null,
            order: isset($d['order']) ? (int) $d['order'] : null,

            type: $d['type'] ?? null,
            orderItemType: $d['orderItemType'] ?? null,
            groupId: $d['groupId'] ?? null,
            productCategoryId: $d['productCategoryId'] ?? null,

            modifierSchemaId: $d['modifierSchemaId'] ?? null,
            modifierSchemaName: $d['modifierSchemaName'] ?? null,
            splittable: isset($d['splittable']) ? (bool) $d['splittable'] : null,
            sizePrices: array_map(
                SizePrice::class.'::fromArray',
                $d['sizePrices'] ?? []
            ),
            modifiers: array_map(
                Modifier::class.'::fromArray',
                $d['modifiers'] ?? []
            ),
            groupModifiers: array_map(
                GroupModifier::class.'::fromArray',
                $d['groupModifiers'] ?? []
            ),

            imageLinks: $d['imageLinks'] ?? [],
            fullNameEnglish: $d['fullNameEnglish'] ?? null,
            doNotPrintInCheque: isset($d['doNotPrintInCheque']) ? (bool) $d['doNotPrintInCheque'] : null,

            useBalanceForSell: isset($d['useBalanceForSell']) ? (bool) $d['useBalanceForSell'] : null,
            canSetOpenPrice: isset($d['canSetOpenPrice']) ? (bool) $d['canSetOpenPrice'] : null,
            isDeleted: isset($d['isDeleted']) ? (bool) $d['isDeleted'] : null,

            fatAmount: isset($d['fatAmount']) ? (float) $d['fatAmount'] : null,
            proteinsAmount: isset($d['proteinsAmount']) ? (float) $d['proteinsAmount'] : null,
            carbohydratesAmount: isset($d['carbohydratesAmount']) ? (float) $d['carbohydratesAmount'] : null,
            energyAmount: isset($d['energyAmount']) ? (float) $d['energyAmount'] : null,
            fatFullAmount: isset($d['fatFullAmount']) ? (float) $d['fatFullAmount'] : null,
            proteinsFullAmount: isset($d['proteinsFullAmount']) ? (float) $d['proteinsFullAmount'] : null,
            carbohydratesFullAmount: isset($d['carbohydratesFullAmount']) ? (float) $d['carbohydratesFullAmount'] : null,
            energyFullAmount: isset($d['energyFullAmount']) ? (float) $d['energyFullAmount'] : null,
            weight: isset($d['weight']) ? (int) $d['weight'] : null,
            measureUnit: $d['measureUnit'] ?? null,

            seoDescription: $d['seoDescription'] ?? null,
            seoText: $d['seoText'] ?? null,
            seoKeywords: $d['seoKeywords'] ?? null,
            seoTitle: $d['seoTitle'] ?? null,
        );
    }
}
