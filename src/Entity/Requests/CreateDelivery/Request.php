<?php

namespace IikoApi\Entity\Requests\CreateDelivery;

use IikoApi\Entity\Requests\BaseRequest;

class Request extends BaseRequest
{
    protected string $organizationId;

    protected ?string $terminalGroupId = null;

    protected ?OrderSetting $createOrderSettings;

    protected Order $order;

    public function __construct(
        string $organizationId,
        Order $order,
        ?string $terminalGroupId,
        ?OrderSetting $createOrderSettings
    ) {
        $this->organizationId = $organizationId;
        $this->terminalGroupId = $terminalGroupId;
        $this->createOrderSettings = $createOrderSettings;
        $this->order = $order;
    }
}
