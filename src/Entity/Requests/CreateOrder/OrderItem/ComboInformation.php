<?php

namespace IikoApi\Entity\Requests\CreateOrder\OrderItem;

use IikoApi\Entity\Requests\BaseRequest;

class ComboInformation extends BaseRequest
{
    /**
     * Created combo ID.
     */
    protected string $comboId;

    /**
     * Action ID that defines combo.
     */
    protected string $comboSourceId;

    /**
     * Combo group ID to which item belongs.
     */
    protected string $comboGroupId;

    protected ?string $comboGroupName = null;

    public function __construct(
        string $comboId, 
        string $comboSourceId, 
        string $comboGroupId,
        ?string $comboGroupName = null
    )
    {
        $this->comboId = $comboId;
        $this->comboSourceId = $comboSourceId;
        $this->comboGroupId = $comboGroupId;
        $this->comboGroupName = $comboGroupName;
    }
}