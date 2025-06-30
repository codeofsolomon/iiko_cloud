<?php

declare(strict_types=1);

namespace IikoApi\Application\Services;

use IikoApi\Constants;
use IikoApi\Domain\Dto\Requests\Menu\MenuRequest;
use IikoApi\Domain\Dto\Responses\Menu\Nomenclature;

final class MenuService extends BaseService
{
    public function getMenu(MenuRequest $filter): Nomenclature
    {
        $response = $this->authorizedRequest(
            'POST',
            Constants::NOMENCLATURE_URL,
            $filter->toArray(),
        );

        return Nomenclature::fromArray($response);
    }
}
