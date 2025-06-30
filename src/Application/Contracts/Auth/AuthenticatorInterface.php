<?php

namespace IikoApi\Application\Contracts\Auth;

interface AuthenticatorInterface
{
    public function token(): string;
}
