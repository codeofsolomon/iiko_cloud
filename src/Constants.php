<?php

namespace IikoApi;

class Constants
{
    public const API_URL = 'https://api-ru.iiko.services/api/1/';

    public const ACCESS_TOKEN_URL = 'access_token';

    public const ORGANIZATIONS_URL = 'organizations';

    public const NOMENCLATURE_URL = 'nomenclature';

    public const DISCOUNTS_URL = 'discounts';

    public const ORDER_TYPES = 'deliveries/order_types';

    public const CREATE_DELIVERY_URL = 'deliveries/create';

    public const RETRIEVE_DELIVERIES_BY_IDS = 'deliveries/by_id';

    public const CREATE_ORDER_URL = 'order/create';

    public const DELIVERY_RESTRICTIONS_URL = 'delivery_restrictions';

    public const DELIVERY_RESTRICTIONS_ALLOWED_URL = 'delivery_restrictions/allowed';

    public const STREETS_BY_CITY = 'streets/by_city';

    public const STREETS_BY_ID_OR_CLASSIFIERLD = 'streets/by_id';

    public const REGIONS = 'regions';

    public const CITY = 'cities';

    public const CUSTOMER_INFO = 'loyalty/iiko/customer/info';

    public const CUSTOMER_CREATE_OR_UPDATE = 'loyalty/iiko/customer/create_or_update';

    public const CUSTOMER_CATEGORY = 'loyalty/iiko/customer_category';

    public const ADD_CUSTOMER_CATEGORY = 'loyalty/iiko/customer_category/add';

    public const REMOVE_CUSTOMER_CATEGORY = 'loyalty/iiko/customer_category/remove';

    public const NON_ACTIVATED_COUPON = 'loyalty/iiko/coupons/by_series';

    public const NON_ACTIVATED_SERIES = 'loyalty/iiko/coupons/series';

    public const PAYMENT_TYPES_URL = 'payment_types';

    public const STOP_LISTS = 'stop_lists';

    public const WEBHOOK_UPDATE_SETTINGS = 'webhooks/update_settings';

    public const LOYALTY_CALCULATE = 'loyalty/iiko/calculate';

    public const COUPON_INFO = 'loyalty/iiko/coupons/info';

    public const PROGRAM = 'loyalty/iiko/program';

    public const API_LOGIN = 'apiLogin';

    public const ERROR_DESCRIPTION = 'errorDescription';

    public const UNKNOWN_ERROR_OCCURRED = 'Unknown error occurred.';
}
