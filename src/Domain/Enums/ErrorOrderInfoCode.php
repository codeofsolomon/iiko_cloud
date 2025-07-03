<?php

namespace IikoApi\Domain\Enums;

use JsonSerializable;

/**
 * Все возможные значения поля errorInfo.code
 * (см. https://api-ru.iiko.services/api/1/deliveries/create).
 */
enum ErrorOrderInfoCode: string implements JsonSerializable
{
    case Common = 'Common';
    case IllegalDeliveryStatus = 'IllegalDeliveryStatus';
    case CustomerNameNotSpecified = 'CustomerNameNotSpecified';
    case ProductNotFound = 'ProductNotFound';
    case MarketingSourceNotFound = 'MarketingSourceNotFound';
    case PaymentTypeNotFound = 'PaymentTypeNotFound';
    case ProductSizeNotFound = 'ProductSizeNotFound';
    case ProductGroupNotFound = 'ProductGroupNotFound';
    case OrderNotFound = 'OrderNotFound';
    case ConceptionNotFound = 'ConceptionNotFound';
    case DuplicatedOrderId = 'DuplicatedOrderId';
    case TerminalGroupIdNotDetermined = 'TerminalGroupIdNotDetermined';
    case TerminalGroupUnregistered = 'TerminalGroupUnregistered';
    case InvalidPhone = 'InvalidPhone';
    case ModifierDuplicated = 'ModifierDuplicated';
    case ProductCanBuyFromCashdesk = 'ProductCanBuyFromCashdesk';
    case DeliveryOpinionMarkInvalid = 'DeliveryOpinionMarkInvalid';
    case WrongDeliveryStatusForOpinion = 'WrongDeliveryStatusForOpinion';
    case OpinionCommentTooLong = 'OpinionCommentTooLong';
    case SurveyItemNotFound = 'SurveyItemNotFound';
    case PaymentTypeCanNotBeUsedAsExternal = 'PaymentTypeCanNotBeUsedAsExternal';
    case AddressNotFound = 'AddressNotFound';
    case HomeNotFound = 'HomeNotFound';
    case IikonetPaymentAdditionalDataCanNotBeParsed = 'IikonetPaymentAdditionalDataCanNotBeParsed';
    case IikonetPaymentExternalIdNotFound = 'IikonetPaymentExternalIdNotFound';
    case IikonetPaymentSumLessThanMarketingDiscount = 'IikonetPaymentSumLessThanMarketingDiscount';
    case DiscountCardNotFound = 'DiscountCardNotFound';
    case DiscountCardTypeModeForbidden = 'DiscountCardTypeModeForbidden';
    case Iikocard5PaymentAdditionalDataCanNotBeParsed = 'Iikocard5PaymentAdditionalDataCanNotBeParsed';
    case Iikocard5PaymentExternalIdNotFound = 'Iikocard5PaymentExternalIdNotFound';
    case Iikocard5PaymentSumLessThanMarketingDiscount = 'Iikocard5PaymentSumLessThanMarketingDiscount';
    case Iikocard5PaymentCanNotCreateCustomData = 'Iikocard5PaymentCanNotCreateCustomData';
    case CourierIdDoesNotExist = 'CourierIdDoesNotExist';
    case CourierDoesNotOwnOrder = 'CourierDoesNotOwnOrder';
    case WrongDeliveryStatus = 'WrongDeliveryStatus';
    case CanNotAssignCourierToOrder = 'CanNotAssignCourierToOrder';
    case UserNotFoundByExternalPassword = 'UserNotFoundByExternalPassword';
    case UserNotFound = 'UserNotFound';
    case Iikocard51PaymentAdditionalDataCanNotBeParsed = 'Iikocard51PaymentAdditionalDataCanNotBeParsed';
    case Iikocard51PaymentCredentialNotFound = 'Iikocard51PaymentCredentialNotFound';
    case Iikocard51PaymentSearchScopeNotFound = 'Iikocard51PaymentSearchScopeNotFound';
    case ComboDuplicated = 'ComboDuplicated';
    case InvalidReferenceToCombo = 'InvalidReferenceToCombo';
    case InvalidComboItemsAmount = 'InvalidComboItemsAmount';
    case InvalidComboItemsGuest = 'InvalidComboItemsGuest';
    case InvalidReferenceToGuest = 'InvalidReferenceToGuest';
    case GuestDuplicated = 'GuestDuplicated';
    case GuestNameNotSpecified = 'GuestNameNotSpecified';
    case OrderTypeNotFound = 'OrderTypeNotFound';
    case OrderServiceTypeDoesNotMatchSelfServiceMode = 'OrderServiceTypeDoesNotMatchSelfServiceMode';
    case DeliveryDateNotSpecified = 'DeliveryDateNotSpecified';
    case OrderStatusChangedInIikoFront = 'OrderStatusChangedInIikoFront';
    case PaymentAdditionalDataTooLong = 'PaymentAdditionalDataTooLong';
    case PaymentSumShouldBePositive = 'PaymentSumShouldBePositive';
    case DiscountSumNotSpecified = 'DiscountSumNotSpecified';
    case InvalidDiscountItem = 'InvalidDiscountItem';
    case RequestProductPriceIsNotEqualToFrontPrice = 'RequestProductPriceIsNotEqualToFrontPrice';
    case OrderItemsNotExists = 'OrderItemsNotExists';
    case EntityAlreadyInUse = 'EntityAlreadyInUse';
    case DiscountItemPositionNotFound = 'DiscountItemPositionNotFound';
    case DiscountItemDuplicatePositions = 'DiscountItemDuplicatePositions';
    case NonUnqiueOrderItemPosition = 'NonUnqiueOrderItemPosition';
    case EmptyOrderItemPosition = 'EmptyOrderItemPosition';
    case IncorrectOrderType = 'IncorrectOrderType';
    case Incorrect = 'Incorrect';
    case TerminalGroupDisabled = 'TerminalGroupDisabled';
    case OrganizationUnregistered = 'OrganizationUnregistered';
    case OrganizationDisabled = 'OrganizationDisabled';
    case TooSmallDeliveryDate = 'TooSmallDeliveryDate';
    case IikoFrontTooOldVersion = 'IikoFrontTooOldVersion';
    case InternalServerError = 'InternalServerError';
    case UnknownError = 'UnknownError';

    public function jsonSerialize(): mixed
    {
        return $this->value;
    }
}
