<?php

namespace IikoApi\Domain\Dto\Responses\Organization;

use IikoApi\Domain\Enums\AddressFormatType;
use IikoApi\Domain\Enums\AddressLookupService;
use IikoApi\Domain\Enums\DeliveryOrderPaymentSetting;
use IikoApi\Domain\Enums\DeliveryServiceType;
use IikoApi\Domain\Enums\ResponseType;

/**
 * Summary of Organization
 *
 * country  - Country
 * restaurantAddress - Restaurant address.
 * latitude - Latitude
 * longitude - Longitude
 * useUaeAddressingSystem - Regional setting "Use the UAE Addressing System".
 * version - RMS version.
 * currencyIsoName - ISO currency code (for example: RUB, USD, EUR).
 * currencyMinimumDenomination - Value rounding of position.
 * countryPhoneCode - Country dialing code.
 * marketingSourceRequiredInDelivery - Require mandatory marketing source input when creating a delivery.
 * defaultDeliveryCityId - Default delivery city.
 * deliveryCityIds - Delivery cities.
 * deliveryServiceType - Delivery type.
 * deliveryOrderPaymentSettings - Delivery order payment settings.
 * defaultCallCenterPaymentTypeId - Default payment type for CallCenter.
 * orderItemCommentEnabled - Allow text comments for order items (in all restaurant sections).
 * inn - Restaurant`s INN (Taxpayer Identification Number).
 * addressFormatType - Address format type.
 * isConfirmationEnabled - Determines whether to use delivery confirmation.
 * confirmAllowedIntervalInMinutes - Confirm orders time interval.
 * isCloud - Determines whether organization is hosted in iikoCloud.
 * isAnonymousGuestsAllowed - If the store allows orders for anonymous guests, then it is not necessary to transfer
 * information about the guest as part of the delivery order. You can only transfer the phone number and optionally
 * name of the guest, which will not be stored in the guest base and will only be used for the delivery of a current
 * delivery order.
 * addressLookup - Available address lookup services.
 * responseType
 * id - Organization ID.
 * name - Organization name.
 * code - Organization`s code.
 */
final readonly class Organization
{
    public function __construct(
        public ResponseType $responseType,
        public string $id,
        public ?string $name,
        public ?string $code,
        public ?string $country,
        public ?string $restaurantAddress,
        public float $latitude,
        public float $longitude,
        public bool $useUaeAddressingSystem,
        public string $version,
        public ?string $currencyIsoName,
        public ?float $currencyMinimumDenomination,
        public ?string $countryPhoneCode,
        public ?bool $marketingSourceRequiredInDelivery,
        public ?string $defaultDeliveryCityId,
        public ?array $deliveryCityIds,
        public ?DeliveryServiceType $deliveryServiceType,
        public ?DeliveryOrderPaymentSetting $deliveryOrderPaymentSettings,
        public ?string $defaultCallCenterPaymentTypeId,
        public ?bool $orderItemCommentEnabled,
        public ?string $inn,
        public AddressFormatType $addressFormatType,
        public ?bool $isConfirmationEnabled,
        public ?int $confirmAllowedIntervalInMinutes,
        public bool $isCloud,
        public ?bool $isAnonymousGuestsAllowed,
        /** @var AddressLookupService[] */
        public array $addressLookup,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            responseType: ResponseType::from($data['responseType']),
            id: $data['id'],
            name: $data['name'] ?? null,
            code: $data['code'] ?? null,
            country: $data['country'] ?? null,
            restaurantAddress: $data['restaurantAddress'] ?? null,
            latitude: (float) ($data['latitude'] ?? 0.0),
            longitude: (float) ($data['longitude'] ?? 0.0),
            useUaeAddressingSystem: (bool) ($data['useUaeAddressingSystem'] ?? false),
            version: (string) ($data['version'] ?? ''),
            currencyIsoName: $data['currencyIsoName'] ?? null,
            currencyMinimumDenomination: isset($data['currencyMinimumDenomination']) ? (float) $data['currencyMinimumDenomination'] : null,
            countryPhoneCode: $data['countryPhoneCode'] ?? null,
            marketingSourceRequiredInDelivery: isset($data['marketingSourceRequiredInDelivery']) ? (bool) $data['marketingSourceRequiredInDelivery'] : null,
            defaultDeliveryCityId: $data['defaultDeliveryCityId'] ?? null,
            deliveryCityIds: $data['deliveryCityIds'] ?? null,
            deliveryServiceType: isset($data['deliveryServiceType'])
                ? DeliveryServiceType::tryFrom($data['deliveryServiceType'])
                : null,
            deliveryOrderPaymentSettings: isset($data['deliveryOrderPaymentSettings'])
                ? DeliveryOrderPaymentSetting::tryFrom($data['deliveryOrderPaymentSettings'])
                : null,
            defaultCallCenterPaymentTypeId: $data['defaultCallCenterPaymentTypeId'] ?? null,
            orderItemCommentEnabled: isset($data['orderItemCommentEnabled']) ? (bool) $data['orderItemCommentEnabled'] : null,
            inn: $data['inn'] ?? null,
            addressFormatType: AddressFormatType::from($data['addressFormatType'] ?? 'Legacy'),
            isConfirmationEnabled: isset($data['isConfirmationEnabled']) ? (bool) $data['isConfirmationEnabled'] : null,
            confirmAllowedIntervalInMinutes: isset($data['confirmAllowedIntervalInMinutes']) ? (int) $data['confirmAllowedIntervalInMinutes'] : null,
            isCloud: (bool) ($data['isCloud'] ?? false),
            isAnonymousGuestsAllowed: isset($data['isAnonymousGuestsAllowed']) ? (bool) $data['isAnonymousGuestsAllowed'] : null,
            addressLookup: array_map(
                fn (string $val) => AddressLookupService::from($val),
                $data['addressLookup'] ?? []
            ),
        );
    }
}
