<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\Webhook;

use IikoApi\Domain\Dto\Requests\BaseRequest;
use Webmozart\Assert\Assert;

abstract class AbstractOrderFilter extends BaseRequest
{
    /**
     * @param  string[]  $orderStatuses
     * @param  string[]  $itemStatuses
     * @param  string[]|null  $returnedExternalDataKeys
     */
    public function __construct(
        public array $orderStatuses = [],
        public array $itemStatuses = [],
        public bool $errors = false,
        public ?array $returnedExternalDataKeys = null,
    ) {
        Assert::allStringNotEmpty($orderStatuses, 'orderStatuses содержит только строки.');
        Assert::allStringNotEmpty($itemStatuses, 'itemStatuses содержит только строки.');
        Assert::nullOrAllStringNotEmpty($returnedExternalDataKeys, 'returnedExternalDataKeys содержит только строки.');
    }
}
