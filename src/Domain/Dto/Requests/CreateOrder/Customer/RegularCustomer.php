<?php

namespace IikoApi\Domain\Dto\Requests\CreateOrder\Customer;

use Carbon\Carbon;
use IikoApi\Domain\Dto\Requests\BaseRequest;
use IikoApi\Domain\Enums\CustomerGender;

class RegularCustomer extends BaseRequest
{
    protected string $type = 'regular';

    /**
     * Existing customer ID in RMS.
     *
     * - If null - the phone number is searched in database, otherwise the new customer is created in RMS.
     */
    protected ?string $id = null;

    /**
     * Name of customer.
     *
     * - [ 0 .. 60 ] characters.
     * - Required for new customers (i.e. if "id" == null) Not required if "id" specified.
     */
    protected ?string $name = null;

    /**
     * Last name.
     *
     * - [ 0 .. 60 ] characters.
     */
    protected ?string $surname = null;

    /**
     * Comment.
     *
     * - [ 0 .. 60 ] characters
     */
    protected ?string $comment = null;

    /**
     * Date of birth.
     *
     * - [ 0 .. 60 ] characters
     * - <yyyy-MM-dd HH:mm:ss.fff>
     */
    protected ?string $birthdate = null;

    /**
     * Email.
     */
    protected ?string $email = null;

    /**
     * Whether customer receives order status notification messages.
     */
    protected ?bool $shouldReceiveOrderStatusNotifications = null;

    /**
     * Gender.
     *
     * Domain\Enums: "NotSpecified" "Male" "Female"
     */
    protected CustomerGender $gender = CustomerGender::GENDER_NOT_SPECIFIED;

    public function __construct(
        ?string $id = null,
        ?string $name = null,
        ?string $surname = null,
        ?string $comment = null,
        ?Carbon $birthdate = null,
        ?string $email = null,
        ?bool $shouldReceiveOrderStatusNotifications = null,
        CustomerGender $gender = CustomerGender::GENDER_NOT_SPECIFIED
    ) {
        $this->id = $id;
        $this->name = $name ? mb_substr($name, 0, 60) : null;
        $this->surname = $surname ? mb_substr($surname, 0, 60) : null;
        $this->comment = $comment ? mb_substr($comment, 0, 60) : null;
        $this->birthdate = $birthdate?->format('Y-m-d H:i:s.v');
        $this->email = $email;
        $this->shouldReceiveOrderStatusNotifications = $shouldReceiveOrderStatusNotifications;
        $this->gender = $gender;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    public function setBirthdate(?string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function setShouldReceiveOrderStatusNotifications(?bool $shouldReceiveOrderStatusNotifications): void
    {
        $this->shouldReceiveOrderStatusNotifications = $shouldReceiveOrderStatusNotifications;
    }

    public function setGender(CustomerGender $gender): void
    {
        $this->gender = $gender;
    }
}
