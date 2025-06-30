<?php

namespace IikoApi\Entity\Requests\CreateDelivery;

use IikoApi\Entity\Requests\BaseRequest;

class OrderSetting extends BaseRequest
{
    protected ?int $transportToFrontTimeout = 8;

    protected ?bool $checkStopList = null;

    public function __construct(
        ?int $transportToFrontTimeout = 8,
        ?bool $checkStopList = null
    ) {
        $this->transportToFrontTimeout = $transportToFrontTimeout;
        $this->checkStopList = $checkStopList;
    }
}
