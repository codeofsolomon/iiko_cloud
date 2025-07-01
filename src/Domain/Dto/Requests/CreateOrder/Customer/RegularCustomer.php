<?php

declare(strict_types=1);

namespace IikoApi\Domain\Dto\Requests\CreateOrder\Customer;

use DateTimeInterface;
use IikoApi\Domain\Dto\Requests\BaseRequest;
use IikoApi\Domain\Enums\CustomerGender;
use Webmozart\Assert\Assert;

/* -------------------------------------------------------------------------
 | 2. Постоянный (regular) гость
 * ---------------------------------------------------------------------- */
class RegularCustomer extends BaseRequest
{
    /** Всегда «regular» */
    public string $type = 'regular';

    /**
     * @param  string|null  $id  UUID клиента в RMS
     * @param  string|null  $name  ≤ 60; обязателен, если $id = null
     * @param  string|null  $surname  ≤ 60
     * @param  string|null  $comment  ≤ 60
     * @param  DateTimeInterface|null  $birthdate  «Y-m-d H:i:s.v» на выходе
     * @param  string|null  $email  email
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $surname = null,
        public ?string $comment = null,
        public ?DateTimeInterface $birthdate = null,
        public ?string $email = null,
        public ?bool $shouldReceiveOrderStatusNotifications = null,
        public CustomerGender $gender = CustomerGender::GENDER_NOT_SPECIFIED,
    ) {
        /* --- UUID & email --- */
        Assert::nullOrUuid($id);
        Assert::nullOrEmail($email);

        /* --- Длины строк --- */
        Assert::nullOrMaxLength($name, 60);
        Assert::nullOrMaxLength($surname, 60);
        Assert::nullOrMaxLength($comment, 60);

        /* --- Логика обязательности --- */
        if ($id === null) {
            Assert::stringNotEmpty($name, 'name обязателен для нового клиента');
        }
    }
}
