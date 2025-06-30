<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Entity\Requests\Menu\MenuRequest;
use IikoApi\Entity\Responses\Menu\Nomenclature;

final class MenuService extends BaseService
{
    public function getMenu(MenuRequest $filter): Nomenclature
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::NOMENCLATURE_URL,
            $filter->prepareRequest(),
        );

        return Nomenclature::fromArray($response);
    }
}
